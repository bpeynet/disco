<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cd
 *
 * @ORM\Table(name="f_cd", uniqueConstraints={@ORM\UniqueConstraint(name="cd", columns={"cd"})}, indexes={@ORM\Index(name="artiste", columns={"artiste"}), @ORM\Index(name="genre", columns={"genre"}), @ORM\Index(name="support", columns={"support"}), @ORM\Index(name="type", columns={"type"}), @ORM\Index(name="airplay", columns={"cd", "airplay"}), @ORM\Index(name="dprogra", columns={"dprogra"}), @ORM\Index(name="jsaisie", columns={"jsaisie"}), @ORM\Index(name="alllabel", columns={"label", "maison", "distrib"}), @ORM\Index(name="jsaisie_anne", columns={"jsaisie", "annee"})})
 * @ORM\Entity
 */
class Cd
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cd", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cd;

    /**
     * @var Artiste
     *
     * @ORM\ManyToOne(targetEntity="Artiste")
     * @ORM\JoinColumn(name="artiste", referencedColumnName="artiste")
     */
    protected $artiste;

    /**
     * @var Piste
     *
     * @ORM\OneToMany(targetEntity="Piste", mappedBy="cd")
     * @ORM\JoinColumn(name="cd", referencedColumnName="cd")
     */
    protected $pistes;

    /**
     * @var CdComment
     *
     * @ORM\OneToMany(targetEntity="CdComment", mappedBy="cd")
     * @ORM\JoinColumn(name="cd", referencedColumnName="cd")
     */
    protected $comments;

    /**
     * @var CdComment
     *
     * @ORM\OneToMany(targetEntity="CdNote", mappedBy="cd")
     * @ORM\JoinColumn(name="cd", referencedColumnName="cd")
     */
    protected $notes;

    /**
     * @var CdEmprunt
     *
     * @ORM\OneToMany(targetEntity="CdEmprunt", mappedBy="cd")
     * @ORM\JoinColumn(name="cd", referencedColumnName="cd")
     */
    protected $emprunts;

    /**
     * @var CdGenre
     *
     * @ORM\OneToMany(targetEntity="CdGenre", mappedBy="cd")
     * @ORM\JoinColumn(name="cd", referencedColumnName="cd")
     */
    protected $styles;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=250, nullable=false)
     */
    private $titre = '';

    /**
     * @var Label
     *
     * @ORM\ManyToOne(targetEntity="Label")
     * @ORM\JoinColumn(name="label", referencedColumnName="label")
     */
    private $label;

    /**
     * @var Label
     *
     * @ORM\ManyToOne(targetEntity="Label")
     * @ORM\JoinColumn(name="maison", referencedColumnName="label")
     */
    private $maison;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Label")
     * @ORM\JoinColumn(name="distrib", referencedColumnName="label")
     */
    private $distrib = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dsortie", type="datetime", nullable=false)
     */
    private $dsortie = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="annee", type="string", length=4, nullable=false)
     */
    private $annee = '';

    /**
     * @var Type
     *
     * @ORM\ManyToOne(targetEntity="Type")
     * @ORM\JoinColumn(name="type", referencedColumnName="type")
     */
    private $type = '0';

    /**
     * @var Support
     *
     * @ORM\ManyToOne(targetEntity="Support")
     * @ORM\JoinColumn(name="support", referencedColumnName="support")
     */
    private $support;

    /**
     * @var Genre
     *
     * @ORM\ManyToOne(targetEntity="Genre")
     * @ORM\JoinColumn(name="genre", referencedColumnName="genre")
     */
    private $genre;

    /**
     * @var Langue
     *
     * @ORM\ManyToOne(targetEntity="Langue")
     * @ORM\JoinColumn(name="langue", referencedColumnName="langue")
     */
    private $langue;

    /**
     * @var Rotation
     *
     * @ORM\ManyToOne(targetEntity="Rotation")
     * @ORM\JoinColumn(name="rotation", referencedColumnName="rotation")
     */
    private $rotation;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_progra", referencedColumnName="user")
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
    private $dsaisie = '0000-00-00 00:00:00';

    /**
     * @var integer
     *
     * @ORM\Column(name="jsaisie", type="integer", nullable=false)
     */
    private $jsaisie = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="dvd", type="boolean", nullable=false)
     */
    private $dvd = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="note_moy", type="float", precision=5, scale=2, nullable=false)
     */
    private $noteMoy = '0.00';

    /**
     * @var boolean
     *
     * @ORM\Column(name="airplay", type="boolean", nullable=false)
     */
    private $airplay = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="retour_mail", type="string", length=100, nullable=false)
     */
    private $retourMail = '';

    /**
     * @var boolean
     *
     * @ORM\Column(name="retour_label", type="boolean", nullable=false)
     */
    private $retourLabel = '0';

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
    private $various = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_piste", type="integer", nullable=false)
     */
    private $nbPiste = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="paulo", type="boolean", nullable=false)
     */
    private $paulo = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="etiquette", type="boolean", nullable=false)
     */
    private $etiquette = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="libartiste", type="string", length=100, nullable=false)
     */
    private $libartiste = '';

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=250, nullable=false)
     */
    private $libelle = '';

    /**
     * @var string
     *
     * @ORM\Column(name="discid", type="string", length=10, nullable=false)
     */
    private $discid = '';

    /**
     * @var string
     *
     * @ORM\Column(name="ref_label", type="string", length=45, nullable=false)
     */
    private $refLabel = '';

    /**
     * @var boolean
     *
     * @ORM\Column(name="suppr", type="boolean", nullable=false)
     */
    private $suppr = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="retour_attendu", type="integer", nullable=false)
     */
    private $retourAttendu = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=15, nullable=false)
     */
    private $img = '';



    /**
     * Set artiste
     *
     * @param Artiste $artiste
     */
    public function setArtiste($artiste)
    {
        $this->artiste = $artiste;
    }

    /**
     * Get artiste
     *
     * @return Artiste
     */
    public function getArtiste()
    {
        return $this->artiste;
    }

    /**
     * Set pistes
     *
     * @param ArrayCollection $pistes
     */
    public function setpistes($pistes)
    {
        $this->pistes = $pistes;
    }

    /**
     * Get pistes
     *
     * @return ArrayCollection
     */
    public function getpistes()
    {
        return $this->pistes;
    }

    /**
     * Set comments
     *
     * @param ArrayCollection $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * Get comments
     *
     * @return ArrayCollection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set notes
     *
     * @param ArrayCollection $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * Get emprunts
     *
     * @return ArrayCollection
     */
    public function getEmprunts()
    {
        return $this->emprunts;
    }

    /**
     * Set emprunts
     *
     * @param ArrayCollection $emprunts
     */
    public function setEmprunts($emprunts)
    {
        $this->emprunts = $emprunts;
    }

    /**
     * Get styles
     *
     * @return ArrayCollection
     */
    public function getStyles()
    {
        return $this->styles;
    }

    /**
     * Set styles
     *
     * @param ArrayCollection $styles
     */
    public function setStyles($styles)
    {
        $this->styles = $styles;
    }

    /**
     * Get notes
     *
     * @return ArrayCollection
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Cd
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set label
     *
     * @param Label $label
     * @return Cd
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
<<<<<<< HEAD:src/AppBundle/Entity/FCd.php
     * @return integer
=======
     * @return Label
>>>>>>> gilles/master:src/AppBundle/Entity/Cd.php
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set maison
     *
     * @param Label $maison
     * @return Cd
     */
    public function setMaison($maison)
    {
        $this->maison = $maison;

        return $this;
    }

    /**
     * Get maison
     *
<<<<<<< HEAD:src/AppBundle/Entity/FCd.php
     * @return integer
=======
     * @return Label
>>>>>>> gilles/master:src/AppBundle/Entity/Cd.php
     */
    public function getMaison()
    {
        return $this->maison;
    }

    /**
     * Set distrib
     *
     * @param integer $distrib
     * @return Cd
     */
    public function setDistrib($distrib)
    {
        $this->distrib = $distrib;

        return $this;
    }

    /**
     * Get distrib
     *
     * @return integer
     */
    public function getDistrib()
    {
        return $this->distrib;
    }

    /**
     * Set dsortie
     *
     * @param \DateTime $dsortie
     * @return Cd
     */
    public function setDsortie($dsortie)
    {
        $this->dsortie = $dsortie;

        return $this;
    }

    /**
     * Get dsortie
     *
     * @return \DateTime
     */
    public function getDsortie()
    {
        return $this->dsortie;
    }

    /**
     * Set annee
     *
     * @param string $annee
     * @return Cd
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return string
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set type
     *
     * @param Type $type
     * @return Cd
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
<<<<<<< HEAD:src/AppBundle/Entity/FCd.php
     * @return integer
=======
     * @return Type
>>>>>>> gilles/master:src/AppBundle/Entity/Cd.php
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set support
     *
     * @param integer $support
     * @return Cd
     */
    public function setSupport($support)
    {
        $this->support = $support;

        return $this;
    }

    /**
     * Get support
     *
     * @return integer
     */
    public function getSupport()
    {
        return $this->support;
    }

    /**
     * Set genre
     *
     * @param integer $genre
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
     * @return integer
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set langue
     *
     * @param integer $langue
     * @return Cd
     */
    public function setLangue($langue)
    {
        $this->langue = $langue;

        return $this;
    }

    /**
     * Get langue
     *
     * @return integer
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * Set rotation
     *
     * @param integer $rotation
     * @return Cd
     */
    public function setRotation($rotation)
    {
        $this->rotation = $rotation;

        return $this;
    }

    /**
     * Get rotation
     *
     * @return integer
     */
    public function getRotation()
    {
        return $this->rotation;
    }

    /**
     * Set userProgra
     *
     * @param integer $userProgra
     * @return Cd
     */
    public function setUserProgra($userProgra)
    {
        $this->userProgra = $userProgra;

        return $this;
    }

    /**
     * Get userProgra
     *
     * @return integer
     */
    public function getUserProgra()
    {
        return $this->userProgra;
    }

    /**
     * Set dprogra
     *
     * @param integer $dprogra
     * @return Cd
     */
    public function setDprogra($dprogra)
    {
        $this->dprogra = $dprogra;

        return $this;
    }

    /**
     * Get dprogra
     *
     * @return integer
     */
    public function getDprogra()
    {
        return $this->dprogra;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Cd
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set dsaisie
     *
     * @param \DateTime $dsaisie
     * @return Cd
     */
    public function setDsaisie($dsaisie)
    {
        $this->dsaisie = $dsaisie;

        return $this;
    }

    /**
     * Get dsaisie
     *
     * @return \DateTime
     */
    public function getDsaisie()
    {
        return $this->dsaisie;
    }

    /**
     * Set jsaisie
     *
     * @param integer $jsaisie
     * @return Cd
     */
    public function setJsaisie($jsaisie)
    {
        $this->jsaisie = $jsaisie;

        return $this;
    }

    /**
     * Get jsaisie
     *
     * @return integer
     */
    public function getJsaisie()
    {
        return $this->jsaisie;
    }

    /**
     * Set dvd
     *
     * @param boolean $dvd
     * @return Cd
     */
    public function setDvd($dvd)
    {
        $this->dvd = $dvd;

        return $this;
    }

    /**
     * Get dvd
     *
     * @return boolean
     */
    public function getDvd()
    {
        return $this->dvd;
    }

    /**
     * Set noteMoy
     *
     * @param float $noteMoy
     * @return Cd
     */
    public function setNoteMoy($noteMoy)
    {
        $this->noteMoy = $noteMoy;

        return $this;
    }

    /**
     * Get noteMoy
     *
     * @return float
     */
    public function getNoteMoy()
    {
        return $this->noteMoy;
    }

    /**
     * Set airplay
     *
     * @param boolean $airplay
     * @return Cd
     */
    public function setAirplay($airplay)
    {
        $this->airplay = $airplay;

        return $this;
    }

    /**
     * Get airplay
     *
     * @return boolean
     */
    public function getAirplay()
    {
        return $this->airplay;
    }

    /**
     * Set retourMail
     *
     * @param string $retourMail
     * @return Cd
     */
    public function setRetourMail($retourMail)
    {
        $this->retourMail = $retourMail;

        return $this;
    }

    /**
     * Get retourMail
     *
     * @return string
     */
    public function getRetourMail()
    {
        return $this->retourMail;
    }

    /**
     * Set retourLabel
     *
     * @param boolean $retourLabel
     * @return Cd
     */
    public function setRetourLabel($retourLabel)
    {
        $this->retourLabel = $retourLabel;

        return $this;
    }

    /**
     * Get retourLabel
     *
     * @return boolean
     */
    public function getRetourLabel()
    {
        return $this->retourLabel;
    }

    /**
     * Set retourComment
     *
     * @param string $retourComment
     * @return Cd
     */
    public function setRetourComment($retourComment)
    {
        $this->retourComment = $retourComment;

        return $this;
    }

    /**
     * Get retourComment
     *
     * @return string
     */
    public function getRetourComment()
    {
        return $this->retourComment;
    }

    /**
     * Set various
     *
     * @param boolean $various
     * @return Cd
     */
    public function setVarious($various)
    {
        $this->various = $various;

        return $this;
    }

    /**
     * Get various
     *
     * @return boolean
     */
    public function getVarious()
    {
        return $this->various;
    }

    /**
     * Set nbPiste
     *
     * @param integer $nbPiste
     * @return Cd
     */
    public function setNbPiste($nbPiste)
    {
        $this->nbPiste = $nbPiste;

        return $this;
    }

    /**
     * Get nbPiste
     *
     * @return integer
     */
    public function getNbPiste()
    {
        return $this->nbPiste;
    }

    /**
     * Set paulo
     *
     * @param boolean $paulo
     * @return Cd
     */
    public function setPaulo($paulo)
    {
        $this->paulo = $paulo;

        return $this;
    }

    /**
     * Get paulo
     *
     * @return boolean
     */
    public function getPaulo()
    {
        return $this->paulo;
    }

    /**
     * Set etiquette
     *
     * @param boolean $etiquette
     * @return Cd
     */
    public function setEtiquette($etiquette)
    {
        $this->etiquette = $etiquette;

        return $this;
    }

    /**
     * Get etiquette
     *
     * @return boolean
     */
    public function getEtiquette()
    {
        return $this->etiquette;
    }

    /**
     * Set libartiste
     *
     * @param string $libartiste
     * @return Cd
     */
    public function setLibartiste($libartiste)
    {
        $this->libartiste = $libartiste;

        return $this;
    }

    /**
     * Get libartiste
     *
     * @return string
     */
    public function getLibartiste()
    {
        return $this->libartiste;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Cd
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set discid
     *
     * @param string $discid
     * @return Cd
     */
    public function setDiscid($discid)
    {
        $this->discid = $discid;

        return $this;
    }

    /**
     * Get discid
     *
     * @return string
     */
    public function getDiscid()
    {
        return $this->discid;
    }

    /**
     * Set refLabel
     *
     * @param string $refLabel
     * @return Cd
     */
    public function setRefLabel($refLabel)
    {
        $this->refLabel = $refLabel;

        return $this;
    }

    /**
     * Get refLabel
     *
     * @return string
     */
    public function getRefLabel()
    {
        return $this->refLabel;
    }

    /**
     * Set suppr
     *
     * @param boolean $suppr
     * @return Cd
     */
    public function setSuppr($suppr)
    {
        $this->suppr = $suppr;

        return $this;
    }

    /**
     * Get suppr
     *
     * @return boolean
     */
    public function getSuppr()
    {
        return $this->suppr;
    }

    /**
     * Set retourAttendu
     *
     * @param integer $retourAttendu
     * @return Cd
     */
    public function setRetourAttendu($retourAttendu)
    {
        $this->retourAttendu = $retourAttendu;

        return $this;
    }

    /**
     * Get retourAttendu
     *
     * @return integer
     */
    public function getRetourAttendu()
    {
        return $this->retourAttendu;
    }

    /**
     * Set img
     *
     * @param string $img
     * @return Cd
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
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
}
