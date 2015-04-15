<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FCle
 *
 * @ORM\Table(name="f_f_cle", uniqueConstraints={@ORM\UniqueConstraint(name="champ", columns={"champ"})})
 * @ORM\Entity
 */
class FCle
{
    /**
     * @var string
     *
     * @ORM\Column(name="champ", type="string", length=45, nullable=false)
     */
    private $champ;

    /**
     * @var integer
     *
     * @ORM\Column(name="cle", type="integer", nullable=false)
     */
    private $cle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="chrono", type="datetime", nullable=false)
     */
    private $chrono;

    /**
     * @var integer
     *
     * @ORM\Column(name="dbkey", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dbkey;


}
