<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FCdEmprunt
 *
 * @ORM\Table(name="f_f_cd_emprunt", indexes={@ORM\Index(name="cle", columns={"cd", "numex"}), @ORM\Index(name="user", columns={"user"}), @ORM\Index(name="disparu", columns={"disparu"}), @ORM\Index(name="cd", columns={"cd"})})
 * @ORM\Entity
 */
class FCdEmprunt
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
     * @ORM\Column(name="numex", type="integer", nullable=false)
     */
    private $numex;

    /**
     * @var integer
     *
     * @ORM\Column(name="user", type="integer", nullable=false)
     */
    private $user;

    /**
     * @var boolean
     *
     * @ORM\Column(name="disparu", type="boolean", nullable=false)
     */
    private $disparu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="chrono", type="datetime", nullable=false)
     */
    private $chrono;

    /**
     * @var integer
     *
     * @ORM\Column(name="ret_user", type="integer", nullable=false)
     */
    private $retUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ret_chrono", type="datetime", nullable=false)
     */
    private $retChrono;

    /**
     * @var integer
     *
     * @ORM\Column(name="emp_user", type="integer", nullable=false)
     */
    private $empUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="emp_chrono", type="datetime", nullable=false)
     */
    private $empChrono;

    /**
     * @var integer
     *
     * @ORM\Column(name="dbkey", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dbkey;


}
