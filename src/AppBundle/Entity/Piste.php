<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Piste
 *
 * @ORM\Table(name="f_piste", indexes={@ORM\Index(name="cd", columns={"cd"}), @ORM\Index(name="artiste", columns={"artiste"}), @ORM\Index(name="piste", columns={"cd", "disque", "piste"})})
 * @ORM\Entity
 */
class Piste
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
     * @var Cd
     * @ORM\ManyToOne(targetEntity="Cd")
     * @ORM\JoinColumn(name="cd", referencedColumnName="cd")
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
     * @var Artiste
     *
     * @ORM\ManyToOne(targetEntity="Artiste")
     * @ORM\JoinColumn(name="artiste", referencedColumnName="artiste")
     */
    private $artiste = null;

    /**
     * @var boolean
     *
     * @ORM\ManyToOne(targetEntity="boolean")
     * @ORM\Column(name="langue", type="boolean", nullable=false)
     */
    private $langue = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="anim", type="boolean", nullable=false)
     */
    private $anim = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="rivendell", type="boolean", nullable=false)
     */
    private $rivendell = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="star", type="boolean", nullable=false)
     */
    private $star = false;



    /**
     * Set piste
     *
     * @param integer $piste
     * @return Piste
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
     * @return Piste
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
     * @return Piste
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
     * @return Piste
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
     * @return Piste
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
     * @param boolean $langue
     * @return Piste
     */
    public function setLangue($langue)
    {
        $this->langue = $langue;

        return $this;
    }

    /**
     * Get langue
     *
     * @return boolean 
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * Set anim
     *
     * @param boolean $anim
     * @return Piste
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
     * Set rivendell
     *
     * @param boolean $rivendell
     * @return Piste
     */
    public function setRivendell($rivendell)
    {
        $this->rivendell = $rivendell;

        return $this;
    }

    /**
     * Get rivendell
     *
     * @return boolean 
     */
    public function getRivendell()
    {
        return $this->rivendell;
    }

    /**
     * Set rivendell
     *
     * @param boolean $rivendell
     * @return Piste
     */
    public function setPaulo($rivendell)
    {
        $this->rivendell = $rivendell;

        return $this;
    }

    /**
     * Get rivendell
     *
     * @return boolean 
     */
    public function getPaulo()
    {
        return $this->rivendell;
    }

    /**
     * Set star
     *
     * @param boolean $star
     * @return Piste
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
