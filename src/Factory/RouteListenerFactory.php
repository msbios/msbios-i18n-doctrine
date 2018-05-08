<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\I18n\Doctrine\Factory;

use Interop\Container\ContainerInterface;
use MSBios\I18n\Doctrine\Listener\RouteListener;
use Zend\I18n\Translator\TranslatorInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class RouteListenerFactory
 * @package MSBios\I18n\Doctrine\Factory
 */
class RouteListenerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return RouteListener
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new RouteListener($container->get(TranslatorInterface::class));
    }
}
