<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Type
 *
 * @ORM\Table(name="f_type", indexes={@ORM\Index(name="libelle", columns={"libelle"})})
 * @ORM\Entity
 */
class Type
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
     * @ORM\OneToMany(targetEntity="Cd", mappedBy="type")
     * @ORM\JoinColumn(name="type", referencedColumnName="type")
     */
    private $disques;

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
     * Set disques
     *
     * @param ArrayCollection $disques
     * @return Type
     */
    public function setDisques($disques)
    {
        $this->disques = $disques;

        return $this;
    }

    /**
     * Get disques
     *
     * @return ArrayCollection 
     */
    public function getDisques()
    {
        return $this->disques;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Type
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
     * @return Type
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
