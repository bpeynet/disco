<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Connect
 *
 * @ORM\Table(name="connect")
 * @ORM\Entity
 */
class Connect
{
    /**
     * @var integer
     *
     * @ORM\Column(name="x_pk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $xPk;

    /**
     * @var string
     *
     * @ORM\Column(name="x_user", type="string", length=45, nullable=false)
     */
    private $xUser = '';

    /**
     * @var string
     *
     * @ORM\Column(name="x_pass", type="string", length=45, nullable=false)
     */
    private $xPass = '';



    /**
     * Set xUser
     *
     * @param string $xUser
     * @return Connect
     */
    public function setXUser($xUser)
    {
        $this->xUser = $xUser;

        return $this;
    }

    /**
     * Get xUser
     *
     * @return string 
     */
    public function getXUser()
    {
        return $this->xUser;
    }

    /**
     * Set xPass
     *
     * @param string $xPass
     * @return Connect
     */
    public function setXPass($xPass)
    {
        $this->xPass = $xPass;

        return $this;
    }

    /**
     * Get xPass
     *
     * @return string 
     */
    public function getXPass()
    {
        return $this->xPass;
    }

    /**
     * Get xPk
     *
     * @return integer 
     */
    public function getXPk()
    {
        return $this->xPk;
    }
}
