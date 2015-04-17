<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CdEmprunt
 *
 * @ORM\Table(name="f_cd_emprunt", indexes={@ORM\Index(name="cle", columns={"cd", "numex"}), @ORM\Index(name="user", columns={"user"}), @ORM\Index(name="disparu", columns={"disparu"}), @ORM\Index(name="cd", columns={"cd"})})
 * @ORM\Entity
 */
class CdEmprunt
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
     * @var Cd
     *
     * @ORM\ManyToOne(targetEntity="Cd")
     * @ORM\JoinColumn(name="cd", referencedColumnName="cd")
     */
    private $cd = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="numex", type="integer", nullable=false)
     */
    private $numex = '1';

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user", referencedColumnName="user")
     */
    private $user = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="disparu", type="boolean", nullable=false)
     */
    private $disparu = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="chrono", type="datetime", nullable=false)
     */
    private $chrono = '0000-00-00 00:00:00';

    /**
     * @var integer
     *
     * @ORM\Column(name="ret_user", type="integer", nullable=false)
     */
    private $retUser = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ret_chrono", type="datetime", nullable=false)
     */
    private $retChrono = '0000-00-00 00:00:00';

    /**
     * @var integer
     *
     * @ORM\Column(name="emp_user", type="integer", nullable=false)
     */
    private $empUser = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="emp_chrono", type="datetime", nullable=false)
     */
    private $empChrono = '0000-00-00 00:00:00';



    /**
     * Set cd
     *
     * @param Cd $cd
     * @return CdEmprunt
     */
    public function setCd($cd)
    {
        $this->cd = $cd;

        return $this;
    }

    /**
     * Get cd
     *
     * @return Cd 
     */
    public function getCd()
    {
        return $this->cd;
    }

    /**
     * Set numex
     *
     * @param integer $numex
     * @return CdEmprunt
     */
    public function setNumex($numex)
    {
        $this->numex = $numex;

        return $this;
    }

    /**
     * Get numex
     *
     * @return integer 
     */
    public function getNumex()
    {
        return $this->numex;
    }

    /**
     * Set user
     *
     * @param User $user
     * @return CdEmprunt
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set disparu
     *
     * @param boolean $disparu
     * @return CdEmprunt
     */
    public function setDisparu($disparu)
    {
        $this->disparu = $disparu;

        return $this;
    }

    /**
     * Get disparu
     *
     * @return boolean 
     */
    public function getDisparu()
    {
        return $this->disparu;
    }

    /**
     * Set chrono
     *
     * @param \DateTime $chrono
     * @return CdEmprunt
     */
    public function setChrono($chrono)
    {
        $this->chrono = $chrono;

        return $this;
    }

    /**
     * Get chrono
     *
     * @return \DateTime 
     */
    public function getChrono()
    {
        return $this->chrono;
    }

    /**
     * Set retUser
     *
     * @param integer $retUser
     * @return CdEmprunt
     */
    public function setRetUser($retUser)
    {
        $this->retUser = $retUser;

        return $this;
    }

    /**
     * Get retUser
     *
     * @return integer 
     */
    public function getRetUser()
    {
        return $this->retUser;
    }

    /**
     * Set retChrono
     *
     * @param \DateTime $retChrono
     * @return CdEmprunt
     */
    public function setRetChrono($retChrono)
    {
        $this->retChrono = $retChrono;

        return $this;
    }

    /**
     * Get retChrono
     *
     * @return \DateTime 
     */
    public function getRetChrono()
    {
        return $this->retChrono;
    }

    /**
     * Set empUser
     *
     * @param integer $empUser
     * @return CdEmprunt
     */
    public function setEmpUser($empUser)
    {
        $this->empUser = $empUser;

        return $this;
    }

    /**
     * Get empUser
     *
     * @return integer 
     */
    public function getEmpUser()
    {
        return $this->empUser;
    }

    /**
     * Set empChrono
     *
     * @param \DateTime $empChrono
     * @return CdEmprunt
     */
    public function setEmpChrono($empChrono)
    {
        $this->empChrono = $empChrono;

        return $this;
    }

    /**
     * Get empChrono
     *
     * @return \DateTime 
     */
    public function getEmpChrono()
    {
        return $this->empChrono;
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
