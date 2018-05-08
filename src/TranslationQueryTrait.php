<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\I18n\Doctrine;

use Doctrine\ORM\Query;
use Gedmo\Translatable\Query\TreeWalker\TranslationWalker;

/**
 * Class TranslatorRepository
 * @package MSBios\I18n\Doctrine
 */
trait TranslationQueryTrait
{
    /**
     * @param Query $query
     * @return Query
     */
    public function addTranslation(Query $query)
    {
        /** Add Translation Hint */
        $query->setHint(
            Query::HINT_CUSTOM_OUTPUT_WALKER,
            TranslationWalker::class
        );

        return $query;
    }
}
