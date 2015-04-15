<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FCdNote
 *
 * @ORM\Table(name="f_cd_note", indexes={@ORM\Index(name="cd", columns={"cd"})})
 * @ORM\Entity
 */
class FCdNote
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
     * @ORM\Column(name="cd", type="integer", nullable=false)
     */
    private $cd = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="user", type="integer", nullable=false)
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
     * @return FCdNote
     */
    public function setCd($cd)
    {
        $this->cd = $cd;

        return $this;
    }

    /**
     * Get cd
     *
     * @return integer 
     */
    public function getCd()
    {
        return $this->cd;
    }

    /**
     * Set user
     *
     * @param integer $user
     * @return FCdNote
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
     * Set note
     *
     * @param float $note
     * @return FCdNote
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
