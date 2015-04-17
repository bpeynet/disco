<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CdNote
 *
 * @ORM\Table(name="f_cd_note", indexes={@ORM\Index(name="cd", columns={"cd"})})
 * @ORM\Entity
 */
class CdNote
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
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user", referencedColumnName="user")
     */
    private $user = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="note", type="float", precision=2, scale=1, nullable=false)
     */
    private $note = '0.0';



    /**
     * Set cd
     *
     * @param integer $cd
     * @return CdNote
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
     * Set user
     *
     * @param User $user
     * @return CdNote
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
     * Set note
     *
     * @param float $note
     * @return CdNote
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return float 
     */
    public function getNote()
    {
        return $this->note;
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
