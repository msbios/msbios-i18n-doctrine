<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\I18n\Doctrine;

use MSBios\Session\Initializer\ContainerInitializer;
use MSBios\Session\Initializer\SessionManagerInitializer;
use Zend\ServiceManager\Factory\InvokableFactory;

return [

    'controllers' => [
        'factories' => [
        ],
        'aliases' => [
        ],
        'initializers' => [
        ]
    ],

    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../../view/',
        ],
    ],

    \MSBios\Assetic\Module::class => [
        'paths' => [
            __DIR__ . '/../../vendor/msbios/application/themes/default/public',
        ],
    ],
];
