<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\I18n\Doctrine;

return [

    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'params' => [
                    'host' => '127.0.0.1',
                    'user' => 'root',
                    'password' => 'root',
                    'dbname' => 'portal.dev',
                ],
            ],
        ],
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
