<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FArtiste
 *
 * @ORM\Table(name="f_artiste", uniqueConstraints={@ORM\UniqueConstraint(name="artiste", columns={"artiste"})}, indexes={@ORM\Index(name="libelle", columns={"libelle"}), @ORM\Index(name="nom", columns={"nom"})})
 * @ORM\Entity
 */
class FArtiste
{
    /**
     * @var integer
     *
     * @ORM\Column(name="artiste", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $artiste;

    /**
     * @ORM\OneToMany(targetEntity="FCd", mappedBy="artiste")
     * @ORM\JoinColumn(name="artiste", referencedColumnName="artiste")
     */
    private $disques;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50, nullable=false)
     */
    private $prenom = '';

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=250, nullable=false)
     */
    private $nom = '';

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=300, nullable=false)
     */
    private $libelle = '';

    /**
     * @var string
     *
     * @ORM\Column(name="siteweb", type="string", length=150, nullable=false)
     */
    private $siteweb = '';

    /**
     * @var string
     *
     * @ORM\Column(name="myspace", type="string", length=150, nullable=false)
     */
    private $myspace = '';

    /**
     * Set Disques
     * @param ArrayCollection $disques
     * return @FArtiste
     */
    public function setDisques($disques) {
        $this->disques = $disques;
    }

    /**
     * Get Disques
     * @return ArrayCollection
     */
    public function getDisques() {
        return $this->disques;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return FArtiste
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return FArtiste
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return FArtiste
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
     * Set siteweb
     *
     * @param string $siteweb
     * @return FArtiste
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
     * Set myspace
     *
     * @param string $myspace
     * @return FArtiste
     */
    public function setMyspace($myspace)
    {
        $this->myspace = $myspace;

        return $this;
    }

    /**
     * Get myspace
     *
     * @return string
     */
    public function getMyspace()
    {
        return $this->myspace;
    }

    /**
     * Get artiste
     *
     * @return integer
     */
    public function getArtiste()
    {
        return $this->artiste;
    }
}
