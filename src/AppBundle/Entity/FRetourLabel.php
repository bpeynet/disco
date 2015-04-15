<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FRetourLabel
 *
 * @ORM\Table(name="f_retour_label", indexes={@ORM\Index(name="cdlabel", columns={"cd", "label"}), @ORM\Index(name="label", columns={"label"})})
 * @ORM\Entity
 */
class FRetourLabel
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
     * @var string
     *
     * @ORM\Column(name="type_retour", type="string", nullable=false)
     */
    private $typeRetour = 'RETOUR';

    /**
     * @var integer
     *
     * @ORM\Column(name="cd", type="integer", nullable=false)
     */
    private $cd = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="label", type="integer", nullable=false)
     */
    private $label = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="user", type="integer", nullable=false)
     */
    private $user = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="chrono", type="datetime", nullable=false)
     */
    private $chrono = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=100, nullable=false)
     */
    private $mail = '';

    /**
     * @var string
     *
     * @ORM\Column(name="cont_mail", type="string", length=250, nullable=false)
     */
    private $contMail = '';

    /**
     * @var string
     *
     * @ORM\Column(name="objet_mail", type="string", length=150, nullable=false)
     */
    private $objetMail = '';



    /**
     * Set typeRetour
     *
     * @param string $typeRetour
     * @return FRetourLabel
     */
    public function setTypeRetour($typeRetour)
    {
        $this->typeRetour = $typeRetour;

        return $this;
    }

    /**
     * Get typeRetour
     *
     * @return string 
     */
    public function getTypeRetour()
    {
        return $this->typeRetour;
    }

    /**
     * Set cd
     *
     * @param integer $cd
     * @return FRetourLabel
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
     * Set label
     *
     * @param integer $label
     * @return FRetourLabel
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
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

    /**
     * Set user
     *
     * @param integer $user
     * @return FRetourLabel
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
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

    /**
     * Set chrono
     *
     * @param \DateTime $chrono
     * @return FRetourLabel
     */
    public function setChrono($chrono)
    {
        $this->chrono = $chrono;

        return $this;
    }

    /**
     * Get chrono
     *
     * @return \DateTime 
     */
    public function getChrono()
    {
        return $this->chrono;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return FRetourLabel
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set contMail
     *
     * @param string $contMail
     * @return FRetourLabel
     */
    public function setContMail($contMail)
    {
        $this->contMail = $contMail;

        return $this;
    }

    /**
     * Get contMail
     *
     * @return string 
     */
    public function getContMail()
    {
        return $this->contMail;
    }

    /**
     * Set objetMail
     *
     * @param string $objetMail
     * @return FRetourLabel
     */
    public function setObjetMail($objetMail)
    {
        $this->objetMail = $objetMail;

        return $this;
    }

    /**
     * Get objetMail
     *
     * @return string 
     */
    public function getObjetMail()
    {
        return $this->objetMail;
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
