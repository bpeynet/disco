<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FSupport
 *
 * @ORM\Table(name="f_support", indexes={@ORM\Index(name="libelle", columns={"libelle"})})
 * @ORM\Entity
 */
class FSupport
{
    /**
     * @var integer
     *
     * @ORM\Column(name="support", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $support;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=45, nullable=false)
     */
    private $libelle = '';

    /**
     * @var boolean
     *
     * @ORM\Column(name="actif", type="boolean", nullable=false)
     */
    private $actif = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="alerte_progra", type="boolean", nullable=false)
     */
    private $alerteProgra = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="recep", type="boolean", nullable=false)
     */
    private $recep = '1';



    /**
     * Set libelle
     *
     * @param string $libelle
     * @return FSupport
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set actif
     *
     * @param boolean $actif
     * @return FSupport
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get actif
     *
     * @return boolean 
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Set alerteProgra
     *
     * @param boolean $alerteProgra
     * @return FSupport
     */
    public function setAlerteProgra($alerteProgra)
    {
        $this->alerteProgra = $alerteProgra;

        return $this;
    }

    /**
     * Get alerteProgra
     *
     * @return boolean 
     */
    public function getAlerteProgra()
    {
        return $this->alerteProgra;
    }

    /**
     * Set recep
     *
     * @param boolean $recep
     * @return FSupport
     */
    public function setRecep($recep)
    {
        $this->recep = $recep;

        return $this;
    }

    /**
     * Get recep
     *
     * @return boolean 
     */
    public function getRecep()
    {
        return $this->recep;
    }

    /**
     * Get support
     *
     * @return integer 
     */
    public function getSupport()
    {
        return $this->support;
    }
}
