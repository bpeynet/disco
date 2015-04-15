<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FUserForum
 *
 * @ORM\Table(name="f_user_forum")
 * @ORM\Entity
 */
class FUserForum
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
     * @ORM\Column(name="author", type="string", length=45, nullable=false)
     */
    private $author = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="user_disco", type="integer", nullable=false)
     */
    private $userDisco = '0';



    /**
     * Set author
     *
     * @param string $author
     * @return FUserForum
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
     * Set userDisco
     *
     * @param integer $userDisco
     * @return FUserForum
     */
    public function setUserDisco($userDisco)
    {
        $this->userDisco = $userDisco;

        return $this;
    }

    /**
     * Get userDisco
     *
     * @return integer 
     */
    public function getUserDisco()
    {
        return $this->userDisco;
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
