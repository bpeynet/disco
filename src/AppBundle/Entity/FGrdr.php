<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FGrdr
 *
 * @ORM\Table(name="f_grdr")
 * @ORM\Entity
 */
class FGrdr
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
     * @ORM\Column(name="groupe", type="string", length=45, nullable=false)
     */
    private $groupe = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="droit", type="string", length=45, nullable=false)
     */
    private $droit = '0';



    /**
     * Set groupe
     *
     * @param string $groupe
     * @return FGrdr
     */
    public function setGroupe($groupe)
    {
        $this->groupe = $groupe;

        return $this;
    }

    /**
     * Get groupe
     *
     * @return string 
     */
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * Set droit
     *
     * @param string $droit
     * @return FGrdr
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
     * Get dbkey
     *
     * @return integer 
     */
    public function getDbkey()
    {
        return $this->dbkey;
    }
}
