<?php

/**
 * Created by PhpStorm.
 * User: fc
 * Date: 2017/2/16
 * Time: 16:51
 */
namespace Blog\Factory;

use Blog\Controller\ListController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ListControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $postService        = $realServiceLocator->get('Blog\Service\PostServiceInterface');

        return new ListController($postService);
    }
}