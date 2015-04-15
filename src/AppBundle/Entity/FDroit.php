<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FDroit
 *
 * @ORM\Table(name="f_f_droit", indexes={@ORM\Index(name="droit", columns={"droit"})})
 * @ORM\Entity
 */
class FDroit
{
    /**
     * @var string
     *
     * @ORM\Column(name="droit", type="string", length=45, nullable=false)
     */
    private $droit;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=150, nullable=false)
     */
    private $libelle;

    /**
     * @var integer
     *
     * @ORM\Column(name="dbkey", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dbkey;


}
