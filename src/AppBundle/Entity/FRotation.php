<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FRotation
 *
 * @ORM\Table(name="f_f_rotation", indexes={@ORM\Index(name="rotation", columns={"rotation"}), @ORM\Index(name="libelle", columns={"libelle"})})
 * @ORM\Entity
 */
class FRotation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rotation", type="integer", nullable=false)
     */
    private $rotation;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=45, nullable=false)
     */
    private $libelle;

    /**
     * @var integer
     *
     * @ORM\Column(name="ordre", type="integer", nullable=false)
     */
    private $ordre;

    /**
     * @var boolean
     *
     * @ORM\Column(name="airplay", type="boolean", nullable=false)
     */
    private $airplay;

    /**
     * @var string
     *
     * @ORM\Column(name="retour_label", type="string", length=200, nullable=false)
     */
    private $retourLabel;

    /**
     * @var boolean
     *
     * @ORM\Column(name="apu", type="boolean", nullable=false)
     */
    private $apu;

    /**
     * @var integer
     *
     * @ORM\Column(name="dbkey", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dbkey;


}
