<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\MongoDB;

return [
    'service_manager' => [
        'factories' => [
            Module::class =>
                Factory\ModuleFactory::class,
        ]
    ],

    Module::class => [

    ],
];
