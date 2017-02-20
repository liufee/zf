<?php

/**
 * Created by PhpStorm.
 * User: fc
 * Date: 2017/2/16
 * Time: 16:26
 */
namespace Blog\Service;

use Blog\Model\PostInterface;

interface PostServiceInterface
{
    public function findAllPosts();

    public function findPost($id);
}