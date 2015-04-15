<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FType
 *
 * @ORM\Table(name="f_type", indexes={@ORM\Index(name="libelle", columns={"libelle"})})
 * @ORM\Entity
 */
class FType
{
    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=45, nullable=false)
     */
    private $libelle = '';

    /**
     * @var boolean
     *
     * @ORM\Column(name="airplay", type="boolean", nullable=false)
     */
    private $airplay = '1';



    /**
     * Set libelle
     *
     * @param string $libelle
     * @return FType
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
     * Set airplay
     *
     * @param boolean $airplay
     * @return FType
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
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }
}
