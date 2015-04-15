<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FHisto
 *
 * @ORM\Table(name="f_f_histo", indexes={@ORM\Index(name="type_his", columns={"jour", "typ_his"}), @ORM\Index(name="jour", columns={"jour"}), @ORM\Index(name="user", columns={"user"})})
 * @ORM\Entity
 */
class FHisto
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="chrono", type="datetime", nullable=false)
     */
    private $chrono;

    /**
     * @var integer
     *
     * @ORM\Column(name="jour", type="integer", nullable=false)
     */
    private $jour;

    /**
     * @var integer
     *
     * @ORM\Column(name="cd", type="integer", nullable=false)
     */
    private $cd;

    /**
     * @var string
     *
     * @ORM\Column(name="typ_his", type="string", nullable=false)
     */
    private $typHis;

    /**
     * @var integer
     *
     * @ORM\Column(name="user", type="integer", nullable=false)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_user", type="string", length=100, nullable=false)
     */
    private $nomUser;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=20, nullable=false)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=250, nullable=false)
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=10, nullable=false)
     */
    private $version;

    /**
     * @var integer
     *
     * @ORM\Column(name="rotation", type="integer", nullable=false)
     */
    private $rotation;

    /**
     * @var integer
     *
     * @ORM\Column(name="dbkey", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dbkey;


}
