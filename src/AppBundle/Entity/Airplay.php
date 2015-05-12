<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Airplay
 *
 * @ORM\Table(name="f_airplay")
 * @ORM\Entity
 */
class Airplay
{
    /**
     * @var integer
     *
     * @ORM\Column(name="airplay", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $airplay;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=200, nullable=false)
     */
    private $libelle = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dcreat", type="datetime", nullable=false)
     */
    private $dcreat = '0000-00-00 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dmodif", type="datetime", nullable=false)
     */
    private $dmodif = '0000-00-00 00:00:00';

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="mUser", referencedColumnName="user")
     */
    private $cUser = '0';

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="mUser", referencedColumnName="user")
     */
    private $mUser = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="publie", type="boolean", nullable=false)
     */
    private $publie = false;


    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Airplay
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
     * Set dcreat
     *
     * @param \DateTime $dcreat
     * @return Airplay
     */
    public function setDcreat($dcreat)
    {
        $this->dcreat = $dcreat;

        return $this;
    }

    /**
     * Get dcreat
     *
     * @return \DateTime 
     */
    public function getDcreat()
    {
        return $this->dcreat;
    }

    /**
     * Set dmodif
     *
     * @param \DateTime $dmodif
     * @return Airplay
     */
    public function setDmodif($dmodif)
    {
        $this->dmodif = $dmodif;

        return $this;
    }

    /**
     * Get dmodif
     *
     * @return \DateTime 
     */
    public function getDmodif()
    {
        return $this->dmodif;
    }

    /**
     * Set cUser
     *
     * @param User $cUser
     * @return Airplay
     */
    public function setCUser($cUser)
    {
        $this->cUser = $cUser;

        return $this;
    }

    /**
     * Get cUser
     *
     * @return User 
     */
    public function getCUser()
    {
        return $this->cUser;
    }

    /**
     * Set mUser
     *
     * @param User $mUser
     * @return Airplay
     */
    public function setMUser($mUser)
    {
        $this->mUser = $mUser;

        return $this;
    }

    /**
     * Get mUser
     *
     * @return User 
     */
    public function getMUser()
    {
        return $this->mUser;
    }

    /**
     * Set publie
     *
     * @param boolean $publie
     * @return Airplay
     */
    public function setPublie($publie)
    {
        $this->publie = $publie;

        return $this;
    }

    /**
     * Get publie
     *
     * @return boolean 
     */
    public function getPublie()
    {
        return $this->publie;
    }

    /**
     * Get airplay
     *
     * @return integer 
     */
    public function getAirplay()
    {
        return $this->airplay;
    }
}
