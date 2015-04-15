<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FHisto
 *
 * @ORM\Table(name="f_histo", indexes={@ORM\Index(name="type_his", columns={"jour", "typ_his"}), @ORM\Index(name="jour", columns={"jour"}), @ORM\Index(name="user", columns={"user"})})
 * @ORM\Entity
 */
class FHisto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="dbkey", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dbkey;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="chrono", type="datetime", nullable=false)
     */
    private $chrono = '0000-00-00 00:00:00';

    /**
     * @var integer
     *
     * @ORM\Column(name="jour", type="integer", nullable=false)
     */
    private $jour = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="cd", type="integer", nullable=false)
     */
    private $cd = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="typ_his", type="string", nullable=false)
     */
    private $typHis = 'CRE';

    /**
     * @var integer
     *
     * @ORM\Column(name="user", type="integer", nullable=false)
     */
    private $user = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="nom_user", type="string", length=100, nullable=false)
     */
    private $nomUser = '';

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=20, nullable=false)
     */
    private $ip = '';

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=250, nullable=false)
     */
    private $comment = '';

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=10, nullable=false)
     */
    private $version = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="rotation", type="integer", nullable=false)
     */
    private $rotation = '0';



    /**
     * Set chrono
     *
     * @param \DateTime $chrono
     * @return FHisto
     */
    public function setChrono($chrono)
    {
        $this->chrono = $chrono;

        return $this;
    }

    /**
     * Get chrono
     *
     * @return \DateTime 
     */
    public function getChrono()
    {
        return $this->chrono;
    }

    /**
     * Set jour
     *
     * @param integer $jour
     * @return FHisto
     */
    public function setJour($jour)
    {
        $this->jour = $jour;

        return $this;
    }

    /**
     * Get jour
     *
     * @return integer 
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * Set cd
     *
     * @param integer $cd
     * @return FHisto
     */
    public function setCd($cd)
    {
        $this->cd = $cd;

        return $this;
    }

    /**
     * Get cd
     *
     * @return integer 
     */
    public function getCd()
    {
        return $this->cd;
    }

    /**
     * Set typHis
     *
     * @param string $typHis
     * @return FHisto
     */
    public function setTypHis($typHis)
    {
        $this->typHis = $typHis;

        return $this;
    }

    /**
     * Get typHis
     *
     * @return string 
     */
    public function getTypHis()
    {
        return $this->typHis;
    }

    /**
     * Set user
     *
     * @param integer $user
     * @return FHisto
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set nomUser
     *
     * @param string $nomUser
     * @return FHisto
     */
    public function setNomUser($nomUser)
    {
        $this->nomUser = $nomUser;

        return $this;
    }

    /**
     * Get nomUser
     *
     * @return string 
     */
    public function getNomUser()
    {
        return $this->nomUser;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return FHisto
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return FHisto
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set version
     *
     * @param string $version
     * @return FHisto
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set rotation
     *
     * @param integer $rotation
     * @return FHisto
     */
    public function setRotation($rotation)
    {
        $this->rotation = $rotation;

        return $this;
    }

    /**
     * Get rotation
     *
     * @return integer 
     */
    public function getRotation()
    {
        return $this->rotation;
    }

    /**
     * Get dbkey
     *
     * @return integer 
     */
    public function getDbkey()
    {
        return $this->dbkey;
    }
}
