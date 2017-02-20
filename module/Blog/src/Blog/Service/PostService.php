<?php
/**
 * Created by PhpStorm.
 * User: fc
 * Date: 2017/2/16
 * Time: 17:36
 */

namespace Blog\Service;

use Blog\Mapper\PostMapperInterface;

class PostService implements PostMapperInterface
{

    protected $postMapper;

    public function __construct( postMapperInterface $postMapper )
    {
        $this->postMapper = $postMapper;
    }

    public function findAllPosts()
    {
        return $this->postMapper->findAll();
    }

    public function findPost($id)
    {
        return $this->postMapper->find($id);
    }

    public function find($id)
    {

    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
    }

}