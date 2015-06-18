<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="f_user")
 * @ORM\Entity
 */
class User implements UserInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Cd", mappedBy="userProgra")
     * @ORM\JoinColumn(name="user", referencedColumnName="user_progra")
     */
    private $disquesManipules;

    /**
     * @var boolean
     *
     * @ORM\Column(name="suppr", type="boolean", nullable=false)
     */
    private $suppr = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inactif", type="date")
     */
    private $inactif = null;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=200, nullable=false)
     */
    private $nom = '';

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=200, nullable=false)
     */
    private $prenom = '';

    /**
     * @var boolean
     *
     * @ORM\Column(name="cotisation", type="boolean", nullable=false)
     */
    private $cotisation = false;

    /**
     * @var string
     *
     * @ORM\Column(name="emission", type="string", length=200, nullable=false)
     */
    private $emission = '';

    /**
     * @var string
     *
     * @Assert\Email(
     *     message = "'{{ value }}' n'est pas un email valide, cela doit-être une adresse mail.",
     *     checkMX = true
     * )
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email = '';

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=400, nullable=false)
     */
    private $libelle = '';

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=20, nullable=false)
     */
    private $password = '';

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=45, nullable=false)
     */
    private $login = '';

    /**
     * @var boolean
     *
     * @ORM\Column(name="alerte_progra", type="boolean", nullable=false)
     */
    private $alerteProgra = '0';

    /**
     *  @var Role[]
     *
     * @ORM\Column(name="role", type="string", nullable=false)
     */
    private $roles = array();

    /**
     * Set disquesManipules
     *
     * @param ArrayCollection $disquesManipules
     * @return Type
     */
    public function setDisquesmanipules($disquesManipules)
    {
        $this->disquesManipules = $disquesManipules;

        return $this;
    }

    /**
     * Get disquesManipules
     *
     * @return ArrayCollection
     */
    public function getDisquesmanipules()
    {
        return $this->disquesManipules;
    }

    /**
     * Set suppr
     *
     * @param boolean $suppr
     * @return User
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
     * Set inactif
     *
     * @param \Date $inactif
     * @return User
     */
    public function setInactif($inactif)
    {
        $this->inactif = $inactif;

        return $this;
    }

    /**
     * Get inactif
     *
     * @return \Date
     */
    public function getInactif()
    {
        return $this->inactif;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return User
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
     * Set prenom
     *
     * @param string $prenom
     * @return User
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
     * Set cotisation
     *
     * @param boolean $cotisation
     * @return User
     */
    public function setCotisation($cotisation)
    {
        $this->cotisation = $cotisation;

        return $this;
    }

    /**
     * Get cotisation
     *
     * @return boolean
     */
    public function getCotisation()
    {
        return $this->cotisation;
    }

    /**
     * Set emission
     *
     * @param string $emission
     * @return User
     */
    public function setEmission($emission)
    {
        if(!$emission) { $emission = ""; }
        $this->emission = $emission;

        return $this;
    }

    /**
     * Get emission
     *
     * @return string
     */
    public function getEmission()
    {
        return $this->emission;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        if(!$email){$email="";}
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
     * Set libelle
     *
     * @param string $libelle
     * @return User
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
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return User
     */
    public function setUsername($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->login;
    }

    public function getSalt()
    {
        return null;
    }

    /**
     * Set roles
     *
     * @param Role[] $roles
     * @return User
     */
    public function setRoles($roles) {
        $this->roles = $roles;
    }

    /**
     * Get roles
     *
     * @return Role[]
     */
    public function getRoles() {
        if(!empty($this->roles)) {
            return array($this->roles);
        } else {
            return array('ROLE_USER');
        }
    }

    /**
     * Set alerteProgra
     *
     * @param boolean $alerteProgra
     * @return User
     */
    public function setAlerteProgra($alerteProgra)
    {
        $this->alerteProgra = $alerteProgra;

        return $this;
    }

    /**
     * Get alerteProgra
     *
     * @return boolean
     */
    public function getAlerteProgra()
    {
        return $this->alerteProgra;
    }

    /**
     * Get user
     *
     * @return integer
     */
    public function getUser()
    {
        return $this->user;
    }


/*

    public function serialize()
    {
        return serialize(array(
            $this->user,
            $this->login,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->user,
            $this->login,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }
*/

    public function eraseCredentials()
    {
    }
}
