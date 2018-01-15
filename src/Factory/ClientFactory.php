<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\MongoDB\Factory;

use Interop\Container\ContainerInterface;
use MSBios\MongoDB\Module;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class ClientFactory
 * @package MSBios\MongoDB\Factory
 */
class ClientFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var array $options */
        $options = $container->get(Module::class);
        return (new \ReflectionClass($requestedName))->newInstanceArgs(
            $options[$requestedName]
        );
    }
}
