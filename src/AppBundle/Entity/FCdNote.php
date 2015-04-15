<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FCdNote
 *
 * @ORM\Table(name="f_f_cd_note", indexes={@ORM\Index(name="cd", columns={"cd"})})
 * @ORM\Entity
 */
class FCdNote
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
     * @ORM\Column(name="user", type="integer", nullable=false)
     */
    private $user;

    /**
     * @var float
     *
     * @ORM\Column(name="note", type="float", precision=2, scale=1, nullable=false)
     */
    private $note;

    /**
     * @var integer
     *
     * @ORM\Column(name="dbkey", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dbkey;


}
