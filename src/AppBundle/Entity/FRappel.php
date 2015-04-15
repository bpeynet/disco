<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FRappel
 *
 * @ORM\Table(name="f_rappel", indexes={@ORM\Index(name="user_champ", columns={"user", "champ"})})
 * @ORM\Entity
 */
class FRappel
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
     * @ORM\Column(name="user", type="string", length=45, nullable=false)
     */
    private $user = '';

    /**
     * @var string
     *
     * @ORM\Column(name="champ", type="string", length=45, nullable=false)
     */
    private $champ = '';

    /**
     * @var string
     *
     * @ORM\Column(name="valeur", type="string", length=45, nullable=false)
     */
    private $valeur = '';



    /**
     * Set user
     *
     * @param string $user
     * @return FRappel
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
     * Set champ
     *
     * @param string $champ
     * @return FRappel
     */
    public function setChamp($champ)
    {
        $this->champ = $champ;

        return $this;
    }

    /**
     * Get champ
     *
     * @return string 
     */
    public function getChamp()
    {
        return $this->champ;
    }

    /**
     * Set valeur
     *
     * @param string $valeur
     * @return FRappel
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
     * Get dbkey
     *
     * @return integer 
     */
    public function getDbkey()
    {
        return $this->dbkey;
    }
}
