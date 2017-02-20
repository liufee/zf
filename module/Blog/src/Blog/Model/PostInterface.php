<?php

/**
 * Created by PhpStorm.
 * User: fc
 * Date: 2017/2/16
 * Time: 16:29
 */
namespace Blog\Model;

interface PostInterface
{
    public function getId();

    public function getTitle();

    public function getText();
}