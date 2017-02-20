<?php

/**
 * Created by PhpStorm.
 * User: fc
 * Date: 2017/2/16
 * Time: 16:03
 */
namespace Blog\Controller;

use Blog\Service\PostServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ListController extends AbstractActionController
{

    protected $postService;

    public function __construct(  $postService )
    {
        $this->postService = $postService;//var_dump($postService);die;
    }

    public function indexAction()
    {
        //return new ViewModel([]);
        return new ViewModel([
           'posts' => $this->postService->findAllPosts()
        ]);
    }

}