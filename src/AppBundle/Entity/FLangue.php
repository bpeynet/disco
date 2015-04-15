<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FLangue
 *
 * @ORM\Table(name="f_f_langue", uniqueConstraints={@ORM\UniqueConstraint(name="langue", columns={"langue"})}, indexes={@ORM\Index(name="libelle", columns={"libelle"})})
 * @ORM\Entity
 */
class FLangue
{
    /**
     * @var integer
     *
     * @ORM\Column(name="langue", type="integer", nullable=false)
     */
    private $langue;

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
     * @var integer
     *
     * @ORM\Column(name="dbkey", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dbkey;


}
