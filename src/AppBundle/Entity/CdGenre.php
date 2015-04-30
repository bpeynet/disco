<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CdGenre
 *
 * @ORM\Table(name="f_cd_genre", indexes={@ORM\Index(name="cd", columns={"cd"})})
 * @ORM\Entity
 */
class CdGenre
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
     * @ORM\ManyToOne(targetEntity="Cd",cascade={"persist"})
     * @ORM\JoinColumn(name="cd", referencedColumnName="cd")
     */
    private $cd = '0';

    /**
     * @var Genre
     *
     * @ORM\ManyToOne(targetEntity="Genre",cascade={"persist"})
     * @ORM\JoinColumn(name="genre", referencedColumnName="genre")
     */
    private $genre;

    
    /**
     * Set cd
     *
     * @param Cd $cd
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
     * @return Cd 
     */
    public function getCd()
    {
        return $this->cd;
    }

    /**
     * Set genre
     *
     * @param Genre $genre
     * @return Cd
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return Genre
     */
    public function getGenre()
    {
        return $this->genre;
    }

}
