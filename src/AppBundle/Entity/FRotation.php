<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FRotation
 *
 * @ORM\Table(name="f_rotation", indexes={@ORM\Index(name="libelle", columns={"libelle"})})
 * @ORM\Entity
 */
class FRotation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rotation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rotation;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=45, nullable=false)
     */
    private $libelle = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="ordre", type="integer", nullable=false)
     */
    private $ordre = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="airplay", type="boolean", nullable=false)
     */
    private $airplay = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="retour_label", type="string", length=200, nullable=false)
     */
    private $retourLabel = '';

    /**
     * @var boolean
     *
     * @ORM\Column(name="apu", type="boolean", nullable=false)
     */
    private $apu = '0';



    /**
     * Set libelle
     *
     * @param string $libelle
     * @return FRotation
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
     * Set ordre
     *
     * @param integer $ordre
     * @return FRotation
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * Get ordre
     *
     * @return integer 
     */
    public function getOrdre()
    {
        return $this->ordre;
    }

    /**
     * Set airplay
     *
     * @param boolean $airplay
     * @return FRotation
     */
    public function setAirplay($airplay)
    {
        $this->airplay = $airplay;

        return $this;
    }

    /**
     * Get airplay
     *
     * @return boolean 
     */
    public function getAirplay()
    {
        return $this->airplay;
    }

    /**
     * Set retourLabel
     *
     * @param string $retourLabel
     * @return FRotation
     */
    public function setRetourLabel($retourLabel)
    {
        $this->retourLabel = $retourLabel;

        return $this;
    }

    /**
     * Get retourLabel
     *
     * @return string 
     */
    public function getRetourLabel()
    {
        return $this->retourLabel;
    }

    /**
     * Set apu
     *
     * @param boolean $apu
     * @return FRotation
     */
    public function setApu($apu)
    {
        $this->apu = $apu;

        return $this;
    }

    /**
     * Get apu
     *
     * @return boolean 
     */
    public function getApu()
    {
        return $this->apu;
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
}
