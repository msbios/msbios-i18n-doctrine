<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\I18n\Doctrine;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\CachedReader;
use Doctrine\Common\Annotations\Reader;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Gedmo\Translatable\TranslatableListener;
use MSBios\Doctrine\ObjectManagerAwareTrait;
use MSBios\I18n\TranslatorAwareTrait;
use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\I18n\Translator\TranslatorInterface;
use Zend\Mvc\MvcEvent;

/**
 * Class ListenerAggregate
 * @package MSBios\I18n\Doctrine
 */
class ListenerAggregate extends AbstractListenerAggregate implements ObjectManagerAwareInterface
{
    use ObjectManagerAwareTrait;
    use TranslatorAwareTrait;

    /**
     * ListenerAggregate constructor.
     * @param ObjectManager $objectManager
     * @param TranslatorInterface $translator
     */
    public function __construct(ObjectManager $objectManager, TranslatorInterface $translator)
    {
        $this
            ->setObjectManager($objectManager)
            ->setTranslator($translator);
    }

    /**
     * @param EventManagerInterface $events
     * @param int $priority
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $events->attach(MvcEvent::EVENT_ROUTE, [$this, 'onRoute'], -100);
    }

    /**
     * @param EventInterface $e
     * @todo https://docs.zendframework.com/zend-mvc-i18n/routing/
     */
    public function onRoute(EventInterface $e)
    {
        /** @var string $locale */
        $locale = $this->getTranslator()->getLocale();

        /** @var ArrayCache $cache */
        $cache = new ArrayCache;
        // standard annotation reader

        /** @var Reader $annotationReader */
        $annotationReader = new AnnotationReader;

        /** @var Reader $cachedAnnotationReader */
        $cachedAnnotationReader = new CachedReader(
            $annotationReader, // use reader
            $cache // and a cache driver
        );

        /** @var EventSubscriber $translatableListener */
        $translatableListener = new TranslatableListener;

        // current translation locale should be set from session or hook later into the listener
        // most important, before entity manager is flushed
        $translatableListener->setTranslatableLocale($locale);
        $translatableListener->setTranslationFallback(true);
        $translatableListener->setPersistDefaultLocaleTranslation(true);
        $translatableListener->setDefaultLocale($locale);
        $translatableListener->setAnnotationReader($cachedAnnotationReader);

        $this->getObjectManager()
            ->getEventManager()
            ->addEventSubscriber($translatableListener);
    }
}
