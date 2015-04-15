<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FLog
 *
 * @ORM\Table(name="f_log")
 * @ORM\Entity
 */
class FLog
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
     * @var \DateTime
     *
     * @ORM\Column(name="chrono", type="datetime", nullable=false)
     */
    private $chrono = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=10, nullable=false)
     */
    private $type = '';

    /**
     * @var string
     *
     * @ORM\Column(name="log", type="text", nullable=false)
     */
    private $log;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=45, nullable=false)
     */
    private $ip = '';

    /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=45, nullable=false)
     */
    private $user = '';

    /**
     * @var string
     *
     * @ORM\Column(name="page", type="string", length=100, nullable=false)
     */
    private $page = '';

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=45, nullable=false)
     */
    private $version = '';

    /**
     * @var string
     *
     * @ORM\Column(name="nom_user", type="string", length=100, nullable=false)
     */
    private $nomUser = '';



    /**
     * Set chrono
     *
     * @param \DateTime $chrono
     * @return FLog
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
     * Set type
     *
     * @param string $type
     * @return FLog
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set log
     *
     * @param string $log
     * @return FLog
     */
    public function setLog($log)
    {
        $this->log = $log;

        return $this;
    }

    /**
     * Get log
     *
     * @return string 
     */
    public function getLog()
    {
        return $this->log;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return FLog
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set user
     *
     * @param string $user
     * @return FLog
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set page
     *
     * @param string $page
     * @return FLog
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return string 
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set version
     *
     * @param string $version
     * @return FLog
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set nomUser
     *
     * @param string $nomUser
     * @return FLog
     */
    public function setNomUser($nomUser)
    {
        $this->nomUser = $nomUser;

        return $this;
    }

    /**
     * Get nomUser
     *
     * @return string 
     */
    public function getNomUser()
    {
        return $this->nomUser;
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
