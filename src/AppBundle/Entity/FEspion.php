<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FEspion
 *
 * @ORM\Table(name="f_espion")
 * @ORM\Entity
 */
class FEspion
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
     * @var integer
     *
     * @ORM\Column(name="user", type="integer", nullable=false)
     */
    private $user = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="chrono", type="datetime", nullable=false)
     */
    private $chrono = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="appli", type="string", length=10, nullable=false)
     */
    private $appli = '';



    /**
     * Set user
     *
     * @param integer $user
     * @return FEspion
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set chrono
     *
     * @param \DateTime $chrono
     * @return FEspion
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
     * Set appli
     *
     * @param string $appli
     * @return FEspion
     */
    public function setAppli($appli)
    {
        $this->appli = $appli;

        return $this;
    }

    /**
     * Get appli
     *
     * @return string 
     */
    public function getAppli()
    {
        return $this->appli;
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
