<?php

/**
 * Created by PhpStorm.
 * User: fc
 * Date: 2017/2/16
 * Time: 17:32
 */
namespace Blog\Mapper;

use Blog\Model\PostInterface;

interface PostMapperInterface
{

    public function find($id);

    public function findAll();

}