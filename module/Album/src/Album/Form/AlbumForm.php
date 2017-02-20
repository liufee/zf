<?php

/**
 * Created by PhpStorm.
 * User: fc
 * Date: 2017/2/16
 * Time: 15:01
 */
namespace Album\Form;

use Zend\Form\Form;

class AlbumForm extends Form
{
    public function __construct($name = null, array $options = array())
    {
        parent::__construct('album', $options);
        $this->add([
            'name' => 'id',
            'type' => 'Hidden',
        ]);
        $this->add([
            'name' => 'title',
            'type' => 'Text',
            'options' => [
                'label' => 'Title',
            ]
        ]);
        $this->add([
            'name' => 'artist',
            'type' => 'Text',
            'options' => [
                'label' => 'Artist',
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