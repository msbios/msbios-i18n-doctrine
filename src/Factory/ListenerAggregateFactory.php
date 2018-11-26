<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\I18n\Doctrine\Factory;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use MSBios\I18n\Doctrine\ListenerAggregate;
use Zend\I18n\Translator\TranslatorInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class ListenerAggregateFactory
 * @package MSBios\I18n\Doctrine\Factory
 */
class ListenerAggregateFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return ListenerAggregate|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ListenerAggregate(
            $container->get(EntityManager::class),
            $container->get(TranslatorInterface::class)
        );
    }
}
