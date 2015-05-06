<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CdComment
 *
 * @ORM\Table(name="f_cd_comment", indexes={@ORM\Index(name="cd", columns={"cd"})})
 * @ORM\Entity
 */
class CdComment
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
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user", referencedColumnName="user")
     */
    private $user = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=false)
     */
    private $comment;

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
     * @ORM\Column(name="id_forum", type="integer", nullable=false)
     */
    private $idForum = '0';



    /**
     * Set chrono
     *
     * @param \DateTime $chrono
     * @return CdComment
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
     * Set user
     *
     * @param User $user
     * @return CdComment
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
     * Set comment
     *
     * @param string $comment
     * @return CdComment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set cd
     *
     * @param integer $cd
     * @return CdComment
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
     * Set idForum
     *
     * @param integer $idForum
     * @return CdComment
     */
    public function setIdForum($idForum)
    {
        $this->idForum = $idForum;

        return $this;
    }

    /**
     * Get idForum
     *
     * @return integer 
     */
    public function getIdForum()
    {
        return $this->idForum;
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

    public function __construct() {
        $this->chrono = new \DateTime();
    }
}
