<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FGrdr
 *
 * @ORM\Table(name="f_f_grdr")
 * @ORM\Entity
 */
class FGrdr
{
    /**
     * @var string
     *
     * @ORM\Column(name="groupe", type="string", length=45, nullable=false)
     */
    private $groupe;

    /**
     * @var string
     *
     * @ORM\Column(name="droit", type="string", length=45, nullable=false)
     */
    private $droit;

    /**
     * @var integer
     *
     * @ORM\Column(name="dbkey", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dbkey;


}
