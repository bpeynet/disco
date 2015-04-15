<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FPiste
 *
 * @ORM\Table(name="f_piste", indexes={@ORM\Index(name="cd", columns={"cd"}), @ORM\Index(name="artiste", columns={"artiste"}), @ORM\Index(name="piste", columns={"cd", "disque", "piste"})})
 * @ORM\Entity
 */
class FPiste
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
     * @var integer
     *
     * @ORM\Column(name="piste", type="integer", nullable=false)
     */
    private $piste = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="cd", type="integer", nullable=false)
     */
    private $cd = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="disque", type="integer", nullable=false)
     */
    private $disque = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=300, nullable=false)
     */
    private $titre = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="artiste", type="integer", nullable=false)
     */
    private $artiste = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="langue", type="integer", nullable=false)
     */
    private $langue = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="anim", type="boolean", nullable=false)
     */
    private $anim = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="paulo", type="boolean", nullable=false)
     */
    private $paulo = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="star", type="boolean", nullable=false)
     */
    private $star = '0';



    /**
     * Set piste
     *
     * @param integer $piste
     * @return FPiste
     */
    public function setPiste($piste)
    {
        $this->piste = $piste;

        return $this;
    }

    /**
     * Get piste
     *
     * @return integer 
     */
    public function getPiste()
    {
        return $this->piste;
    }

    /**
     * Set cd
     *
     * @param integer $cd
     * @return FPiste
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
     * Set disque
     *
     * @param integer $disque
     * @return FPiste
     */
    public function setDisque($disque)
    {
        $this->disque = $disque;

        return $this;
    }

    /**
     * Get disque
     *
     * @return integer 
     */
    public function getDisque()
    {
        return $this->disque;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return FPiste
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set artiste
     *
     * @param integer $artiste
     * @return FPiste
     */
    public function setArtiste($artiste)
    {
        $this->artiste = $artiste;

        return $this;
    }

    /**
     * Get artiste
     *
     * @return integer 
     */
    public function getArtiste()
    {
        return $this->artiste;
    }

    /**
     * Set langue
     *
     * @param integer $langue
     * @return FPiste
     */
    public function setLangue($langue)
    {
        $this->langue = $langue;

        return $this;
    }

    /**
     * Get langue
     *
     * @return integer 
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * Set anim
     *
     * @param boolean $anim
     * @return FPiste
     */
    public function setAnim($anim)
    {
        $this->anim = $anim;

        return $this;
    }

    /**
     * Get anim
     *
     * @return boolean 
     */
    public function getAnim()
    {
        return $this->anim;
    }

    /**
     * Set paulo
     *
     * @param boolean $paulo
     * @return FPiste
     */
    public function setPaulo($paulo)
    {
        $this->paulo = $paulo;

        return $this;
    }

    /**
     * Get paulo
     *
     * @return boolean 
     */
    public function getPaulo()
    {
        return $this->paulo;
    }

    /**
     * Set star
     *
     * @param boolean $star
     * @return FPiste
     */
    public function setStar($star)
    {
        $this->star = $star;

        return $this;
    }

    /**
     * Get star
     *
     * @return boolean 
     */
    public function getStar()
    {
        return $this->star;
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
