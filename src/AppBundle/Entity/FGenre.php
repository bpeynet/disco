<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FGenre
 *
 * @ORM\Table(name="f_f_genre", uniqueConstraints={@ORM\UniqueConstraint(name="genre", columns={"genre"})}, indexes={@ORM\Index(name="libelle", columns={"libelle"})})
 * @ORM\Entity
 */
class FGenre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="genre", type="integer", nullable=false)
     */
    private $genre;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=45, nullable=false)
     */
    private $libelle;

    /**
     * @var boolean
     *
     * @ORM\Column(name="actif", type="boolean", nullable=false)
     */
    private $actif;

    /**
     * @var integer
     *
     * @ORM\Column(name="dbkey", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dbkey;


}
