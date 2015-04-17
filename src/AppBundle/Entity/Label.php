<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Label
 *
 * @ORM\Table(name="f_label", indexes={@ORM\Index(name="libelle", columns={"libelle"})})
 * @ORM\Entity
 */
class Label
{
    /**
     * @var integer
     *
     * @ORM\Column(name="label", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $label;

    /**
     * @ORM\OneToMany(targetEntity="Cd", mappedBy="label")
     * @ORM\JoinColumn(name="label", referencedColumnName="label")
     */
    private $estLabelDe;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=45, nullable=false)
     */
    private $libelle = '';

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=false)
     */
    private $email = '';

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=45, nullable=false)
     */
    private $telephone = '';

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=45, nullable=false)
     */
    private $adresse = '';

    /**
     * @var string
     *
     * @ORM\Column(name="adresse2", type="string", length=45, nullable=false)
     */
    private $adresse2 = '';

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=45, nullable=false)
     */
    private $cp = '';

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=45, nullable=false)
     */
    private $ville = '';

    /**
     * @var string
     *
     * @ORM\Column(name="mail_progra", type="string", length=250, nullable=false)
     */
    private $mailProgra = '';

    /**
     * @var string
     *
     * @ORM\Column(name="contact1", type="string", length=150, nullable=false)
     */
    private $contact1 = '';

    /**
     * @var string
     *
     * @ORM\Column(name="siteweb", type="string", length=150, nullable=false)
     */
    private $siteweb = '';

    /**
     * @var boolean
     *
     * @ORM\Column(name="suppr", type="boolean", nullable=false)
     */
    private $suppr = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="info", type="text", nullable=false)
     */
    private $info;



    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Label
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
     * Set estLabelDe
     *
     * @param ArrayCollection $estLabelDe
     * @return Label
     */
    public function setEstLabelDe($estLabelDe)
    {
        $this->estLabelDe = $estLabelDe;

        return $this;
    }

    /**
     * Get estLabelDe
     *
     * @return ArrayCollection 
     */
    public function getEstLabelDe()
    {
        return $this->estLabelDe;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Label
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Label
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Label
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set adresse2
     *
     * @param string $adresse2
     * @return Label
     */
    public function setAdresse2($adresse2)
    {
        $this->adresse2 = $adresse2;

        return $this;
    }

    /**
     * Get adresse2
     *
     * @return string 
     */
    public function getAdresse2()
    {
        return $this->adresse2;
    }

    /**
     * Set cp
     *
     * @param string $cp
     * @return Label
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Label
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set mailProgra
     *
     * @param string $mailProgra
     * @return Label
     */
    public function setMailProgra($mailProgra)
    {
        $this->mailProgra = $mailProgra;

        return $this;
    }

    /**
     * Get mailProgra
     *
     * @return string 
     */
    public function getMailProgra()
    {
        return $this->mailProgra;
    }

    /**
     * Set contact1
     *
     * @param string $contact1
     * @return Label
     */
    public function setContact1($contact1)
    {
        $this->contact1 = $contact1;

        return $this;
    }

    /**
     * Get contact1
     *
     * @return string 
     */
    public function getContact1()
    {
        return $this->contact1;
    }

    /**
     * Set siteweb
     *
     * @param string $siteweb
     * @return Label
     */
    public function setSiteweb($siteweb)
    {
        $this->siteweb = $siteweb;

        return $this;
    }

    /**
     * Get siteweb
     *
     * @return string 
     */
    public function getSiteweb()
    {
        return $this->siteweb;
    }

    /**
     * Set suppr
     *
     * @param boolean $suppr
     * @return Label
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
     * Set info
     *
     * @param string $info
     * @return Label
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return string 
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Get label
     *
     * @return integer 
     */
    public function getLabel()
    {
        return $this->label;
    }
}
