<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FCd
 *
 * @ORM\Table(name="f_f_cd", uniqueConstraints={@ORM\UniqueConstraint(name="cd", columns={"cd"})}, indexes={@ORM\Index(name="artiste", columns={"artiste"}), @ORM\Index(name="genre", columns={"genre"}), @ORM\Index(name="support", columns={"support"}), @ORM\Index(name="type", columns={"type"}), @ORM\Index(name="airplay", columns={"cd", "airplay"}), @ORM\Index(name="dprogra", columns={"dprogra"}), @ORM\Index(name="jsaisie", columns={"jsaisie"}), @ORM\Index(name="alllabel", columns={"label", "maison", "distrib"}), @ORM\Index(name="jsaisie_anne", columns={"jsaisie", "annee"})})
 * @ORM\Entity
 */
class FCd
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
     * @ORM\Column(name="artiste", type="integer", nullable=false)
     */
    private $artiste;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=250, nullable=false)
     */
    private $titre;

    /**
     * @var integer
     *
     * @ORM\Column(name="label", type="integer", nullable=false)
     */
    private $label;

    /**
     * @var integer
     *
     * @ORM\Column(name="maison", type="integer", nullable=false)
     */
    private $maison;

    /**
     * @var integer
     *
     * @ORM\Column(name="distrib", type="integer", nullable=false)
     */
    private $distrib;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dsortie", type="datetime", nullable=false)
     */
    private $dsortie;

    /**
     * @var string
     *
     * @ORM\Column(name="annee", type="string", length=4, nullable=false)
     */
    private $annee;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer", nullable=false)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="support", type="integer", nullable=false)
     */
    private $support;

    /**
     * @var integer
     *
     * @ORM\Column(name="genre", type="integer", nullable=false)
     */
    private $genre;

    /**
     * @var integer
     *
     * @ORM\Column(name="langue", type="integer", nullable=false)
     */
    private $langue;

    /**
     * @var integer
     *
     * @ORM\Column(name="rotation", type="integer", nullable=false)
     */
    private $rotation;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_progra", type="integer", nullable=false)
     */
    private $userProgra;

    /**
     * @var integer
     *
     * @ORM\Column(name="dprogra", type="integer", nullable=false)
     */
    private $dprogra;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=false)
     */
    private $comment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dsaisie", type="datetime", nullable=false)
     */
    private $dsaisie;

    /**
     * @var integer
     *
     * @ORM\Column(name="jsaisie", type="integer", nullable=false)
     */
    private $jsaisie;

    /**
     * @var boolean
     *
     * @ORM\Column(name="dvd", type="boolean", nullable=false)
     */
    private $dvd;

    /**
     * @var float
     *
     * @ORM\Column(name="note_moy", type="float", precision=5, scale=2, nullable=false)
     */
    private $noteMoy;

    /**
     * @var boolean
     *
     * @ORM\Column(name="airplay", type="boolean", nullable=false)
     */
    private $airplay;

    /**
     * @var string
     *
     * @ORM\Column(name="retour_mail", type="string", length=100, nullable=false)
     */
    private $retourMail;

    /**
     * @var boolean
     *
     * @ORM\Column(name="retour_label", type="boolean", nullable=false)
     */
    private $retourLabel;

    /**
     * @var string
     *
     * @ORM\Column(name="retour_comment", type="text", nullable=false)
     */
    private $retourComment;

    /**
     * @var boolean
     *
     * @ORM\Column(name="various", type="boolean", nullable=false)
     */
    private $various;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_piste", type="integer", nullable=false)
     */
    private $nbPiste;

    /**
     * @var boolean
     *
     * @ORM\Column(name="paulo", type="boolean", nullable=false)
     */
    private $paulo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="etiquette", type="boolean", nullable=false)
     */
    private $etiquette;

    /**
     * @var string
     *
     * @ORM\Column(name="libartiste", type="string", length=100, nullable=false)
     */
    private $libartiste;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=250, nullable=false)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="discid", type="string", length=10, nullable=false)
     */
    private $discid;

    /**
     * @var string
     *
     * @ORM\Column(name="ref_label", type="string", length=45, nullable=false)
     */
    private $refLabel;

    /**
     * @var boolean
     *
     * @ORM\Column(name="suppr", type="boolean", nullable=false)
     */
    private $suppr;

    /**
     * @var integer
     *
     * @ORM\Column(name="retour_attendu", type="integer", nullable=false)
     */
    private $retourAttendu;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=15, nullable=false)
     */
    private $img;

    /**
     * @var integer
     *
     * @ORM\Column(name="dbkey", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dbkey;


}
