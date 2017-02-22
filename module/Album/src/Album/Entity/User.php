<?php

/**
 * Created by PhpStorm.
 * User: fc
 * Date: 2017/2/22
 * Time: 18:16
 */
namespace Album\Entity;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $Name;
}