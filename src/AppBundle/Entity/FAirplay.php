<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FAirplay
 *
 * @ORM\Table(name="f_f_airplay")
 * @ORM\Entity
 */
class FAirplay
{
    /**
     * @var integer
     *
     * @ORM\Column(name="airplay", type="integer", nullable=false)
     */
    private $airplay;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=200, nullable=false)
     */
    private $libelle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dcreat", type="datetime", nullable=false)
     */
    private $dcreat;

    /**
     * @var integer
     *
     * @ORM\Column(name="annee", type="integer", nullable=false)
     */
    private $annee;

    /**
     * @var integer
     *
     * @ORM\Column(name="mois", type="integer", nullable=false)
     */
    private $mois;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dmodif", type="datetime", nullable=false)
     */
    private $dmodif;

    /**
     * @var integer
     *
     * @ORM\Column(name="c_user", type="integer", nullable=false)
     */
    private $cUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="m_user", type="integer", nullable=false)
     */
    private $mUser;

    /**
     * @var boolean
     *
     * @ORM\Column(name="publie", type="boolean", nullable=false)
     */
    private $publie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="chrono", type="datetime", nullable=false)
     */
    private $chrono;

    /**
     * @var boolean
     *
     * @ORM\Column(name="courant", type="boolean", nullable=false)
     */
    private $courant;

    /**
     * @var integer
     *
     * @ORM\Column(name="dbkey", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dbkey;


}
