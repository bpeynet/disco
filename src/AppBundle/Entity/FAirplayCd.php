<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FAirplayCd
 *
 * @ORM\Table(name="f_airplay_cd", uniqueConstraints={@ORM\UniqueConstraint(name="cle", columns={"airplay", "cd"})}, indexes={@ORM\Index(name="airplay", columns={"airplay"}), @ORM\Index(name="cd", columns={"cd"})})
 * @ORM\Entity
 */
class FAirplayCd
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
     * @ORM\Column(name="airplay", type="integer", nullable=false)
     */
    private $airplay = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="cd", type="integer", nullable=false)
     */
    private $cd = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ordre", type="integer", nullable=false)
     */
    private $ordre = '0';



    /**
     * Set airplay
     *
     * @param integer $airplay
     * @return FAirplayCd
     */
    public function setAirplay($airplay)
    {
        $this->airplay = $airplay;

        return $this;
    }

    /**
     * Get airplay
     *
     * @return integer 
     */
    public function getAirplay()
    {
        return $this->airplay;
    }

    /**
     * Set cd
     *
     * @param integer $cd
     * @return FAirplayCd
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
     * Set ordre
     *
     * @param integer $ordre
     * @return FAirplayCd
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * Get ordre
     *
     * @return integer 
     */
    public function getOrdre()
    {
        return $this->ordre;
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
