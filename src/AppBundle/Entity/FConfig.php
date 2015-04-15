<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FConfig
 *
 * @ORM\Table(name="f_f_config", indexes={@ORM\Index(name="cle", columns={"cle"})})
 * @ORM\Entity
 */
class FConfig
{
    /**
     * @var string
     *
     * @ORM\Column(name="cle", type="string", length=50, nullable=false)
     */
    private $cle;

    /**
     * @var string
     *
     * @ORM\Column(name="valeur", type="string", length=500, nullable=false)
     */
    private $valeur;

    /**
     * @var integer
     *
     * @ORM\Column(name="user", type="integer", nullable=false)
     */
    private $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="dbkey", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dbkey;


}
