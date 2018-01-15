<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\I18n\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trait EntityTranslationTrait
 * @package MSBios\I18n\Doctrine\Entity
 */
trait EntityTranslationTrait
{
    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *   targetEntity="ObjectTranslationInterface",
     *   mappedBy="object",
     *   cascade={"persist", "remove"}
     * )
     */
    private $translations;

    /**
     * @return ArrayCollection
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * @param Collection $translations
     * @return $this
     */
    public function setTranslations(Collection $translations)
    {
        /** @var ObjectTranslationInterface $translation */
        foreach ($translations as $translation) {
            $this->addTranslation($translation);
        }
        return $this;
    }

    /**
     * @param ObjectTranslationInterface $translation
     * @return $this
     */
    public function addTranslation(ObjectTranslationInterface $translation)
    {
        if (! $this->translations->contains($translation)) {
            $this->translations[] = $translation;
            $translation->setObject($this);
        }
        return $this;
    }

    /**
     * @param Collection $translations
     * @return $this
     */
    public function removeTranslations(Collection $translations)
    {
        /** @var ObjectTranslationInterface $translation */
        foreach ($translations as $translation) {
            $this->removeTranslation($translation);
        }
        return $this;
    }

    /**
     * @param ObjectTranslationInterface $translation
     * @return $this
     */
    public function removeTranslation(ObjectTranslationInterface $translation)
    {
        $this->translations->removeElement($translation);
        return $this;
    }
}
