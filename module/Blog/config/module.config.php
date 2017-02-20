<?php
/**
 * Created by PhpStorm.
 * User: fc
 * Date: 2017/2/16
 * Time: 15:56
 */
return [
    'controllers' => array(
        /*
        'invokables' => array(
            'Blog\Controller\List' => 'Blog\Controller\ListController'
        )
        */
        'factories' => array(
            'Blog\Controller\List' => 'Blog\Factory\ListControllerFactory'
        )
    ),

    'router' => [
        'routes' => [
            'post' => [
                'type' => 'literal',
                'options' => [
                    // Listen to "/blog" as uri
                    'route' => '/blog',
                    'defaults' => [
                        'controller' => 'Blog\Controller\List',
                        'action' => 'index',
                    ]
                ]
            ]
        ]
    ],

    'service_manager' => array(
        /*
        'invokables' => array(
            'Blog\Service\PostServiceInterface' => 'Blog\Service\PostService'
        )
        */
        'factories' => array(
            'Blog\Service\PostServiceInterface' => 'Blog\Factory\PostServiceFactory'
        )
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'blog' => __DIR__ . '/../view',
        ),
    ),
];