<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FCle
 *
 * @ORM\Table(name="f_cle", uniqueConstraints={@ORM\UniqueConstraint(name="champ", columns={"champ"})})
 * @ORM\Entity
 */
class FCle
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
     * @ORM\Column(name="champ", type="string", length=45, nullable=false)
     */
    private $champ = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="cle", type="integer", nullable=false)
     */
    private $cle = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="chrono", type="datetime", nullable=false)
     */
    private $chrono = '0000-00-00 00:00:00';



    /**
     * Set champ
     *
     * @param string $champ
     * @return FCle
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
     * Set cle
     *
     * @param integer $cle
     * @return FCle
     */
    public function setCle($cle)
    {
        $this->cle = $cle;

        return $this;
    }

    /**
     * Get cle
     *
     * @return integer 
     */
    public function getCle()
    {
        return $this->cle;
    }

    /**
     * Set chrono
     *
     * @param \DateTime $chrono
     * @return FCle
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
     * Get dbkey
     *
     * @return integer 
     */
    public function getDbkey()
    {
        return $this->dbkey;
    }
}
