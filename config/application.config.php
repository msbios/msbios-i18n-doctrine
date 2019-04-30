<?php
/**
 * If you need an environment-specific system or application configuration,
 * there is an example in the documentation
 * @see https://docs.zendframework.com/tutorials/advanced-config/#environment-specific-system-configuration
 * @see https://docs.zendframework.com/tutorials/advanced-config/#environment-specific-application-configuration
 */
return [
    // Retrieve list of modules used in this application.
    'modules' => [
        'MSBios\Session',
        'MSBios\Permissions\Acl',
        'MSBios\Cache',
        'Zend\Serializer',
        'MSBios\Hydrator',
        'MSBios\Paginator\Doctrine',
        'MSBios\Validator',
        'MSBios\Resource\Doctrine',
        'Zend\Log',
        'MSBios\View',
        'Zend\Session',
        'Zend\Paginator',
        'Zend\Validator',
        'MSBios\Guard\Doctrine',
        'MSBios\Portal\Doctrine',
        'MSBios\Portal',
        'MSBios\CPanel\Doctrine',
        'MSBios\CPanel',
        'MSBios\Guard\CPanel',
        'MSBios\Guard\CPanel\Doctrine',
        'MSBios\Authentication\Doctrine',
        'MSBios\Guard\Resource\Doctrine',
        'MSBios\Form\Doctrine',
        'MSBios\Doctrine',
        'Zend\Cache',
        'MSBios\Guard\Resource',
        'MSBios\Authentication',
        'MSBios\Guard',
        'MSBios\Db',
        'Zend\Db',
        'MSBios\Form',
        'MSBios\Application',
        'Zend\Mvc\Plugin\FilePrg',
        'Zend\Form',
        'Zend\Hydrator',
        'Zend\InputFilter',
        'Zend\Filter',
        'Zend\Mvc\Plugin\FlashMessenger',
        'Zend\Mvc\Plugin\Identity',
        'Zend\Mvc\Plugin\Prg',
        'Zend\Router',
        'Zend\I18n',
        'Zend\Navigation',
        'MSBios\Navigation',
        'MSBios\Theme',
        'MSBios\Widget',

        'MSBios\Assetic',
        'MSBios\I18n',
        'ZendDeveloperTools',
        'DoctrineModule',
        'DoctrineORMModule',
    ],

    'module_listener_options' => [
        'module_paths' => [
            './module',
            './vendor',
        ],
        'config_glob_paths' => [
            realpath(__DIR__) . '/autoload/{{,*.}global,{,*.}local}.php',
        ],
        'config_cache_enabled' => false,
        // 'config_cache_key' => 'application.config.cache',
        'module_map_cache_enabled' => false,
        // 'module_map_cache_key' => 'application.module.cache',
        'cache_dir' => 'data/cache/',
    ],
];
