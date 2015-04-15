<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FLabel
 *
 * @ORM\Table(name="f_f_label", indexes={@ORM\Index(name="label", columns={"label"}), @ORM\Index(name="libelle", columns={"libelle"})})
 * @ORM\Entity
 */
class FLabel
{
    /**
     * @var integer
     *
     * @ORM\Column(name="label", type="integer", nullable=false)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=45, nullable=false)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=45, nullable=false)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=45, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse2", type="string", length=45, nullable=false)
     */
    private $adresse2;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=45, nullable=false)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=45, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_progra", type="string", length=250, nullable=false)
     */
    private $mailProgra;

    /**
     * @var string
     *
     * @ORM\Column(name="contact1", type="string", length=150, nullable=false)
     */
    private $contact1;

    /**
     * @var string
     *
     * @ORM\Column(name="siteweb", type="string", length=150, nullable=false)
     */
    private $siteweb;

    /**
     * @var boolean
     *
     * @ORM\Column(name="suppr", type="boolean", nullable=false)
     */
    private $suppr;

    /**
     * @var string
     *
     * @ORM\Column(name="info", type="text", nullable=false)
     */
    private $info;

    /**
     * @var integer
     *
     * @ORM\Column(name="dbkey", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dbkey;


}
