<?php
/**
 * Created by PhpStorm.
 * User: fc
 * Date: 2017/2/24
 * Time: 16:08
 */

namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Orders
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var \User\Entity\Orders
     * @ORM\ManyToOne(targetEntity="\User\Entity\User", inversedBy="id")
     */

    protected $user;

    /** @ORM\Column(type="string") */
    protected $goods;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Order
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGoods()
    {
        return $this->goods;
    }

    /**
     * @param mixed $goods
     * @return Order
     */
    public function setGoods($goods)
    {
        $this->goods = $goods;
        return $this;
    }

}