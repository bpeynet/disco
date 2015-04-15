<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FRappel
 *
 * @ORM\Table(name="f_f_rappel", indexes={@ORM\Index(name="user_champ", columns={"user", "champ"})})
 * @ORM\Entity
 */
class FRappel
{
    /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=45, nullable=false)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="champ", type="string", length=45, nullable=false)
     */
    private $champ;

    /**
     * @var string
     *
     * @ORM\Column(name="valeur", type="string", length=45, nullable=false)
     */
    private $valeur;

    /**
     * @var integer
     *
     * @ORM\Column(name="dbkey", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dbkey;


}
