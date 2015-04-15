<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FAirplayCd
 *
 * @ORM\Table(name="f_f_airplay_cd", uniqueConstraints={@ORM\UniqueConstraint(name="cle", columns={"airplay", "cd"})}, indexes={@ORM\Index(name="airplay", columns={"airplay"}), @ORM\Index(name="cd", columns={"cd"})})
 * @ORM\Entity
 */
class FAirplayCd
{
    /**
     * @var integer
     *
     * @ORM\Column(name="airplay", type="integer", nullable=false)
     */
    private $airplay;

    /**
     * @var integer
     *
     * @ORM\Column(name="cd", type="integer", nullable=false)
     */
    private $cd;

    /**
     * @var integer
     *
     * @ORM\Column(name="ordre", type="integer", nullable=false)
     */
    private $ordre;

    /**
     * @var integer
     *
     * @ORM\Column(name="dbkey", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dbkey;


}
