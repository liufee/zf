<?php

namespace User\Form;

use Zend\Form\Form;

class UserForm extends Form
{
    public function __construct($name = null, array $options = array())
    {
        parent::__construct('user', $options);
        $this->add([
            'name' => 'id',
            'type' => 'Hidden',
        ]);
        $this->add([
            'name' => 'name',
            'type' => 'Text',
            'options' => [
                'label' => '用户名',
            ]
        ]);
        $this->add([
            'name' => 'password',
            'type' => 'Text',
            'options' => [
                'label' => '密码',
            ]
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => [
                'value' => 'Go',
                'id' => 'submitbutton',
            ]
        ]);
        $this->setAttribute('method', 'POST');

    }

}