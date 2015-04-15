<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FGroupe
 *
 * @ORM\Table(name="f_f_groupe")
 * @ORM\Entity
 */
class FGroupe
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
     * @ORM\Column(name="description", type="string", length=45, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="dbkey", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dbkey;


}
