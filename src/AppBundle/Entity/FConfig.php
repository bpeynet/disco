<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FConfig
 *
 * @ORM\Table(name="f_config", indexes={@ORM\Index(name="cle", columns={"cle"})})
 * @ORM\Entity
 */
class FConfig
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
     * @ORM\Column(name="cle", type="string", length=50, nullable=false)
     */
    private $cle = '';

    /**
     * @var string
     *
     * @ORM\Column(name="valeur", type="string", length=500, nullable=false)
     */
    private $valeur = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="user", type="integer", nullable=false)
     */
    private $user = '0';



    /**
     * Set cle
     *
     * @param string $cle
     * @return FConfig
     */
    public function setCle($cle)
    {
        $this->cle = $cle;

        return $this;
    }

    /**
     * Get cle
     *
     * @return string 
     */
    public function getCle()
    {
        return $this->cle;
    }

    /**
     * Set valeur
     *
     * @param string $valeur
     * @return FConfig
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return string 
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set user
     *
     * @param integer $user
     * @return FConfig
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
     * Get dbkey
     *
     * @return integer 
     */
    public function getDbkey()
    {
        return $this->dbkey;
    }
}
