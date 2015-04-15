<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ForumPrograBodies
 *
 * @ORM\Table(name="forum_progra_bodies", indexes={@ORM\Index(name="thread", columns={"thread"})})
 * @ORM\Entity
 */
class ForumPrograBodies
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text", nullable=false)
     */
    private $body;

    /**
     * @var integer
     *
     * @ORM\Column(name="thread", type="integer", nullable=false)
     */
    private $thread = '0';



    /**
     * Set body
     *
     * @param string $body
     * @return ForumPrograBodies
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set thread
     *
     * @param integer $thread
     * @return ForumPrograBodies
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
