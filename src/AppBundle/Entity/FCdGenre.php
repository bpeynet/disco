<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FCdGenre
 *
 * @ORM\Table(name="f_cd_genre", uniqueConstraints={@ORM\UniqueConstraint(name="tmp", columns={"cd", "genre"})}, indexes={@ORM\Index(name="cd", columns={"cd"})})
 * @ORM\Entity
 */
class FCdGenre
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
     * @ORM\Column(name="genre", type="integer", nullable=false)
     */
    private $genre = '0';



    /**
     * Set cd
     *
     * @param integer $cd
     * @return FCdGenre
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
     * Set genre
     *
     * @param integer $genre
     * @return FCdGenre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return integer 
     */
    public function getGenre()
    {
        return $this->genre;
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
