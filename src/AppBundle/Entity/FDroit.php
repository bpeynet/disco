<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FDroit
 *
 * @ORM\Table(name="f_droit", indexes={@ORM\Index(name="droit", columns={"droit"})})
 * @ORM\Entity
 */
class FDroit
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
     * @var string
     *
     * @ORM\Column(name="droit", type="string", length=45, nullable=false)
     */
    private $droit = '';

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=150, nullable=false)
     */
    private $libelle = '';



    /**
     * Set droit
     *
     * @param string $droit
     * @return FDroit
     */
    public function setDroit($droit)
    {
        $this->droit = $droit;

        return $this;
    }

    /**
     * Get droit
     *
     * @return string 
     */
    public function getDroit()
    {
        return $this->droit;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return FDroit
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
     * Get dbkey
     *
     * @return integer 
     */
    public function getDbkey()
    {
        return $this->dbkey;
    }
}
