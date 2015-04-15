<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FLog
 *
 * @ORM\Table(name="f_f_log")
 * @ORM\Entity
 */
class FLog
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="chrono", type="datetime", nullable=false)
     */
    private $chrono;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=10, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="log", type="text", nullable=false)
     */
    private $log;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=45, nullable=false)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=45, nullable=false)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="page", type="string", length=100, nullable=false)
     */
    private $page;

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=45, nullable=false)
     */
    private $version;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_user", type="string", length=100, nullable=false)
     */
    private $nomUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="dbkey", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dbkey;


}
