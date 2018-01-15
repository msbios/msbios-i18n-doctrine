<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\I18n\Doctrine\Entity;

use Gedmo\Translatable\Entity\MappedSuperclass\AbstractPersonalTranslation;

/**
 * Class ObjectTranslation
 * @package MSBios\I18n\Doctrine\Entity
 * @ORM\MappedSuperclass
 */
abstract class ObjectTranslation extends AbstractPersonalTranslation implements ObjectTranslationInterface
{
    /**
     * ObjectTranslation constructor.
     * @param $locale
     * @param $field
     * @param $content
     */
    public function __construct($locale, $field, $content)
    {
        $this->setLocale($locale);
        $this->setField($field);
        $this->setContent($content);
    }
}
