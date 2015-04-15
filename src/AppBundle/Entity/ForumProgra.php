<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ForumProgra
 *
 * @ORM\Table(name="forum_progra", indexes={@ORM\Index(name="author", columns={"author"}), @ORM\Index(name="userid", columns={"userid"}), @ORM\Index(name="datestamp", columns={"datestamp"}), @ORM\Index(name="subject", columns={"subject"}), @ORM\Index(name="thread", columns={"thread"}), @ORM\Index(name="parent", columns={"parent"}), @ORM\Index(name="approved", columns={"approved"}), @ORM\Index(name="msgid", columns={"msgid"}), @ORM\Index(name="modifystamp", columns={"modifystamp"})})
 * @ORM\Entity
 */
class ForumProgra
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datestamp", type="datetime", nullable=false)
     */
    private $datestamp = '0000-00-00 00:00:00';

    /**
     * @var integer
     *
     * @ORM\Column(name="thread", type="integer", nullable=false)
     */
    private $thread = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="parent", type="integer", nullable=false)
     */
    private $parent = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=37, nullable=false)
     */
    private $author = '';

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255, nullable=false)
     */
    private $subject = '';

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=200, nullable=false)
     */
    private $email = '';

    /**
     * @var string
     *
     * @ORM\Column(name="host", type="string", length=255, nullable=false)
     */
    private $host = '';

    /**
     * @var string
     *
     * @ORM\Column(name="email_reply", type="string", length=1, nullable=false)
     */
    private $emailReply = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="approved", type="string", length=1, nullable=false)
     */
    private $approved = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="msgid", type="string", length=100, nullable=false)
     */
    private $msgid = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="modifystamp", type="integer", nullable=false)
     */
    private $modifystamp = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="userid", type="integer", nullable=false)
     */
    private $userid = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="closed", type="boolean", nullable=false)
     */
    private $closed = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="id_disco", type="integer", nullable=false)
     */
    private $idDisco = '0';



    /**
     * Set datestamp
     *
     * @param \DateTime $datestamp
     * @return ForumProgra
     */
    public function setDatestamp($datestamp)
    {
        $this->datestamp = $datestamp;

        return $this;
    }

    /**
     * Get datestamp
     *
     * @return \DateTime 
     */
    public function getDatestamp()
    {
        return $this->datestamp;
    }

    /**
     * Set thread
     *
     * @param integer $thread
     * @return ForumProgra
     */
    public function setThread($thread)
    {
        $this->thread = $thread;

        return $this;
    }

    /**
     * Get thread
     *
     * @return integer 
     */
    public function getThread()
    {
        return $this->thread;
    }

    /**
     * Set parent
     *
     * @param integer $parent
     * @return ForumProgra
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return integer 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return ForumProgra
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set subject
     *
     * @param string $subject
     * @return ForumProgra
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return ForumProgra
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set host
     *
     * @param string $host
     * @return ForumProgra
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get host
     *
     * @return string 
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set emailReply
     *
     * @param string $emailReply
     * @return ForumProgra
     */
    public function setEmailReply($emailReply)
    {
        $this->emailReply = $emailReply;

        return $this;
    }

    /**
     * Get emailReply
     *
     * @return string 
     */
    public function getEmailReply()
    {
        return $this->emailReply;
    }

    /**
     * Set approved
     *
     * @param string $approved
     * @return ForumProgra
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;

        return $this;
    }

    /**
     * Get approved
     *
     * @return string 
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Set msgid
     *
     * @param string $msgid
     * @return ForumProgra
     */
    public function setMsgid($msgid)
    {
        $this->msgid = $msgid;

        return $this;
    }

    /**
     * Get msgid
     *
     * @return string 
     */
    public function getMsgid()
    {
        return $this->msgid;
    }

    /**
     * Set modifystamp
     *
     * @param integer $modifystamp
     * @return ForumProgra
     */
    public function setModifystamp($modifystamp)
    {
        $this->modifystamp = $modifystamp;

        return $this;
    }

    /**
     * Get modifystamp
     *
     * @return integer 
     */
    public function getModifystamp()
    {
        return $this->modifystamp;
    }

    /**
     * Set userid
     *
     * @param integer $userid
     * @return ForumProgra
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return integer 
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set closed
     *
     * @param boolean $closed
     * @return ForumProgra
     */
    public function setClosed($closed)
    {
        $this->closed = $closed;

        return $this;
    }

    /**
     * Get closed
     *
     * @return boolean 
     */
    public function getClosed()
    {
        return $this->closed;
    }

    /**
     * Set idDisco
     *
     * @param integer $idDisco
     * @return ForumProgra
     */
    public function setIdDisco($idDisco)
    {
        $this->idDisco = $idDisco;

        return $this;
    }

    /**
     * Get idDisco
     *
     * @return integer 
     */
    public function getIdDisco()
    {
        return $this->idDisco;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
