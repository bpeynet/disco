<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FSupport
 *
 * @ORM\Table(name="f_f_support", indexes={@ORM\Index(name="support", columns={"support"}), @ORM\Index(name="libelle", columns={"libelle"})})
 * @ORM\Entity
 */
class FSupport
{
    /**
     * @var integer
     *
     * @ORM\Column(name="support", type="integer", nullable=false)
     */
    private $support;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=45, nullable=false)
     */
    private $libelle;

    /**
     * @var boolean
     *
     * @ORM\Column(name="actif", type="boolean", nullable=false)
     */
    private $actif;

    /**
     * @var boolean
     *
     * @ORM\Column(name="alerte_progra", type="boolean", nullable=false)
     */
    private $alerteProgra;

    /**
     * @var boolean
     *
     * @ORM\Column(name="recep", type="boolean", nullable=false)
     */
    private $recep;

    /**
     * @var integer
     *
     * @ORM\Column(name="dbkey", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dbkey;


}
