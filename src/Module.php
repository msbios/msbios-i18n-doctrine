<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 * @link https://github.com/RWOverdijk/AssetManager
 */
namespace MSBios\I18n\Doctrine;

use MSBios\ModuleInterface;
use Zend\EventManager\EventInterface;
use Zend\EventManager\LazyListenerAggregate;
use Zend\Loader\AutoloaderFactory;
use Zend\Loader\StandardAutoloader;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\Mvc\ApplicationInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class Module
 * @package MSBios\I18n\Doctrine
 */
class Module implements
    ModuleInterface,
    AutoloaderProviderInterface
{
    /** @const VERSION */
    const VERSION = '1.0.12';

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     * Return an array for passing to Zend\Loader\AutoloaderFactory.
     *
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return [
            AutoloaderFactory::STANDARD_AUTOLOADER => [
                StandardAutoloader::LOAD_NS => [
                    __NAMESPACE__ => __DIR__,
                ],
            ],
        ];
    }

    // /**
    //  * Listen to the bootstrap event
    //  *
    //  * @param EventInterface $e
    //  * @return array
    //  */
    // public function onBootstrap(EventInterface $e)
    // {
    //     /** @var ApplicationInterface $target */
    //     $target = $e->getTarget();
    //
    //     /** @var ServiceLocatorInterface $serviceManager */
    //     $serviceManager = $target->getServiceManager();
    //
    //     (new LazyListenerAggregate(
    //         $serviceManager->get(self::class)['listeners'],
    //         $serviceManager
    //     ))->attach($target->getEventManager());
    // }
}
