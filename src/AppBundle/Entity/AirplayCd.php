<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AirplayCd
 *
 * @ORM\Table(name="f_airplay_cd", uniqueConstraints={@ORM\UniqueConstraint(name="cle", columns={"airplay", "cd"})}, indexes={@ORM\Index(name="airplay", columns={"airplay"}), @ORM\Index(name="cd", columns={"cd"})})
 * @ORM\Entity
 */
class AirplayCd
{

    /**
     * @var Airplay
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Airplay")
     * @ORM\JoinColumn(name="airplay", referencedColumnName="airplay")
     */
    private $airplay = '0';

    /**
     * @var Cd
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Cd")
     * @ORM\JoinColumn(name="cd", referencedColumnName="cd")
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
     * @param Airplay $airplay
     * @return AirplayCd
     */
    public function setAirplay($airplay)
    {
        $this->airplay = $airplay;

        return $this;
    }

    /**
     * Get airplay
     *
     * @return Airplay 
     */
    public function getAirplay()
    {
        return $this->airplay;
    }

    /**
     * Set cd
     *
     * @param Cd $cd
     * @return AirplayCd
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
     * Set ordre
     *
     * @param integer $ordre
     * @return AirplayCd
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
}
