<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FCdGenre
 *
 * @ORM\Table(name="f_f_cd_genre", indexes={@ORM\Index(name="cd", columns={"cd"}), @ORM\Index(name="cle", columns={"cd", "genre"})})
 * @ORM\Entity
 */
class FCdGenre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cd", type="integer", nullable=false)
     */
    private $cd;

    /**
     * @var integer
     *
     * @ORM\Column(name="genre", type="integer", nullable=false)
     */
    private $genre;

    /**
     * @var integer
     *
     * @ORM\Column(name="dbkey", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dbkey;


}
