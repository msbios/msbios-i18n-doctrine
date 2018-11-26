<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\I18n\Doctrine;

return [

    'doctrine' => [
        'driver' => [
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

            // listeners
            Listener\RouteListener::class =>
                Factory\RouteListenerFactory::class
        ]
    ],

    'listeners' => [
        ListenerAggregate::class =>
            ListenerAggregate::class
    ],

    Module::class => [
        // 'listeners' => [
        //     Listener\RouteListener::class => [
        //         'listener' => Listener\RouteListener::class,
        //         'method' => 'onRoute',
        //         'event' => \Zend\Mvc\MvcEvent::EVENT_ROUTE,
        //         'priority' => -100,
        //     ]
        // ]
    ],
];
