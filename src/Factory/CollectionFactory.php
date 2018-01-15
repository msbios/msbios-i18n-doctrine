<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\MongoDB\Factory;

use Interop\Container\ContainerInterface;
use MongoDB\Collection;
use MSBios\MongoDB\Module;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class CollectionFactory
 * @package MSBios\MongoDB\Factory
 */
class CollectionFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
    }
}
