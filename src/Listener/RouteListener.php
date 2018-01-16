<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\I18n\Doctrine\Listener;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\CachedReader;
use Doctrine\Common\Annotations\Reader;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\EntityManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Gedmo\Translatable\TranslatableListener;
use MSBios\Doctrine\ObjectManagerAwareTrait;
use MSBios\I18n\TranslatorAwareInterface;
use MSBios\I18n\TranslatorAwareTrait;
use Zend\EventManager\EventInterface;

/**
 * Class RouteListener
 * @package MSBios\I18n\Doctrine\Listener
 */
class RouteListener implements TranslatorAwareInterface, ObjectManagerAwareInterface
{
    use TranslatorAwareTrait;
    use ObjectManagerAwareTrait;

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

        /** @var EntityManager $em */
        $this->getObjectManager()->getEventManager()
            ->addEventSubscriber($translatableListener);
    }
}
