<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FGroupe
 *
 * @ORM\Table(name="f_groupe")
 * @ORM\Entity
 */
class FGroupe
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
     * @ORM\Column(name="description", type="string", length=45, nullable=false)
     */
    private $description = '';



    /**
     * Set groupe
     *
     * @param string $groupe
     * @return FGroupe
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
     * Set description
     *
     * @param string $description
     * @return FGroupe
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
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
