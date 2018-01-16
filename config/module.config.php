<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\I18n\Doctrine;

use Zend\ServiceManager\Factory\InvokableFactory;

return [

    'doctrine' => [
        'configuration' => [
            'orm_default' => [
                'types' => [
                    // ...
                ],
            ],
        ],
        'eventmanager' => [
            'orm_default' => [
                'subscribers' => [
                    // ...
                ]
            ]
        ],
        'driver' => [
            // defines an annotation driver with two paths, and names it `my_annotation_driver`
            // Module::class => [
               // 'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
               // 'cache' => 'array',
               // 'paths' => [
               //     __DIR__ . '/../src/Entity'
               // ],
            // ],

            // default metadata driver, aggregates all other drivers into a single one.
            // Override `orm_default` only if you know what you're doing
            'orm_default' => [
                'drivers' => [
                    // ...
                ]
            ],
            'entity_resolver' => [
                'orm_default' => [
                    'resolvers' => [
                        Entity\ObjectTranslationInterface::class =>
                            Entity\ObjectTranslation::class
                    ],
                ],
            ],
        ],
    ],

    'service_manager' => [
        'factories' => [
            Module::class =>
                Factory\ModuleFactory::class,

            Listener\RouteListener::class =>
                InvokableFactory::class
        ]
    ],

    Module::class => [
        'listeners' => [
            Listener\RouteListener::class => [ // MSBios\I18n\Doctrine\Listener\RouteListener::class
                'listener' => Listener\RouteListener::class,
                'method' => 'onRoute',
                'event' => \Zend\Mvc\MvcEvent::EVENT_ROUTE,
                'priority' => -100,
            ]
        ]
    ],
];
