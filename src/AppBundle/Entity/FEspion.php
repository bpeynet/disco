<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FEspion
 *
 * @ORM\Table(name="f_f_espion")
 * @ORM\Entity
 */
class FEspion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="user", type="integer", nullable=false)
     */
    private $user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="chrono", type="datetime", nullable=false)
     */
    private $chrono;

    /**
     * @var string
     *
     * @ORM\Column(name="appli", type="string", length=10, nullable=false)
     */
    private $appli;

    /**
     * @var integer
     *
     * @ORM\Column(name="dbkey", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dbkey;


}
