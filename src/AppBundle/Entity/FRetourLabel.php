<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FRetourLabel
 *
 * @ORM\Table(name="f_f_retour_label", indexes={@ORM\Index(name="cdlabel", columns={"cd", "label"}), @ORM\Index(name="label", columns={"label"})})
 * @ORM\Entity
 */
class FRetourLabel
{
    /**
     * @var string
     *
     * @ORM\Column(name="type_retour", type="string", nullable=false)
     */
    private $typeRetour;

    /**
     * @var integer
     *
     * @ORM\Column(name="cd", type="integer", nullable=false)
     */
    private $cd;

    /**
     * @var integer
     *
     * @ORM\Column(name="label", type="integer", nullable=false)
     */
    private $label;

    /**
     * @var integer
     *
     * @ORM\Column(name="user", type="integer", nullable=false)
     */
    private $user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="chrono", type="datetime", nullable=false)
     */
    private $chrono;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=100, nullable=false)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="cont_mail", type="string", length=250, nullable=false)
     */
    private $contMail;

    /**
     * @var string
     *
     * @ORM\Column(name="objet_mail", type="string", length=150, nullable=false)
     */
    private $objetMail;

    /**
     * @var integer
     *
     * @ORM\Column(name="dbkey", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dbkey;


}
