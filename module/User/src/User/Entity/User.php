<?php

/**
 * Created by PhpStorm.
 * User: fc
 * Date: 2017/2/22
 * Time: 18:16
 */
namespace User\Entity;
use Doctrine\ORM\Mapping as ORM;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

/** @ORM\Entity */
class User implements InputFilterAwareInterface
{

    protected $inputFilter;

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if( !$this->inputFilter ){

            $inputFilter = new InputFilter();

            $inputFilter->add([
               'name' => 'name',
                'required' => true,
            ]);

            $inputFilter->add([
               'name' => 'password',
                'required' => true,
                'filters' => [
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ],
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 6,
                            'max'      => 10,
                        ),
                    ),
                ),
            ]);
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    public function exchangeArray ($data = array())
    {
        $this->name = $data['name'];
        $this->password = $data['password'];
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $name;

    /** @ORM\Column(type="string") */
    protected $password;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @var \User\Entity\Orders
     * @ORM\OneToMany(targetEntity="\User\Entity\Orders", mappedBy="user")
     */
    protected $orders;

    /**
     * @return \User\Entity\Orderq
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param \User\Entity\Orders $orders
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;
    }


}