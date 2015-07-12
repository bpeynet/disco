<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Support
 *
 * @ORM\Table(name="f_support", indexes={@ORM\Index(name="libelle", columns={"libelle"})})
 * @ORM\Entity
 */
class Support
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
     * @ORM\OneToMany(targetEntity="Cd", mappedBy="support")
     * @ORM\JoinColumn(name="support", referencedColumnName="support")
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
     * @ORM\Column(name="actif", type="boolean", nullable=false)
     */
    private $actif = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="recep", type="boolean", nullable=false)
     */
    private $recep = '1';

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
     * @return Support
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
     * @return Support
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
     * Set recep
     *
     * @param boolean $recep
     * @return Support
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
