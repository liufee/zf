<?php
/**
 * Created by PhpStorm.
 * User: fc
 * Date: 2017/2/16
 * Time: 18:01
 */

namespace Blog\Factory;


use Blog\Service\PostService;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

class PostServiceFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new PostService(
            $serviceLocator->get('Blog\Mapper\PostMapperInterface')
        );
    }
}