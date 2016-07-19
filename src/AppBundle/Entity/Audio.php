<?php

namespace AppBundle\Entity;

use AppBundle\AppBundle;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Table(name="f_audio")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Audio {
    
    /**
     * @ORM\Id
     * @ORM\Column(name="id",type="string", nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    
    private $path;
   
    /**
     * @Assert\File(maxSize ="10Mi",mimeTypes={"audio/mpeg","audio/mp4"})
     * @Assert\NotBlank
     */
    private $file;
    
    private $temp;
    
    private $cd;
    
    private $piste;
    
    public function setCd($cd) {
        $this->cd = $cd;
    }

    public function setPiste($piste) {
        $this->piste = $piste;
    }
 
    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        // check if we have an old image path
        if (isset($this->path)) {
            // store the old name to delete after the update
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }
    
    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile() {
        return $this->file;
    }
    
    function getPath() {
        return $this->path;
    }
    
    public function getAbsolutePath() {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath() {
        return null === $this->path
            ? null
            : 'audio/cd_'.$this->getCd().'/'.$this->path;
    }

    protected function getUploadRootDir() {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.DIRECTORY_SEPARATOR.AppBundle::getUploadRootDir().DIRECTORY_SEPARATOR.join(DIRECTORY_SEPARATOR, array('fichiers audio temporaires'));
    }
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            // do whatever you want to generate a unique name
            $filename = 'cd_'.$this->cd.'_piste_'.$this->piste;
            $this->path = $filename.'.'.$this->getFile()->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }
        

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getFile()->move($this->getUploadRootDir(), $this->path);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir().'/'.$this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->file = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        $file = $this->getAbsolutePath();
        if ($file) {
            unlink($file);
        }
    }
    
}
