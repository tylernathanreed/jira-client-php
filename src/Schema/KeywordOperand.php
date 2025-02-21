<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * An operand that is a JQL keyword.
 * See "Advanced searching - keywords reference" for more information about operand keywords.
 * 
 * @link https://confluence.atlassian.com/jiracorecloud/advanced-searching-keywords-reference-765593717.html#Advancedsearching-keywordsreference-EMPTYEMPTY
 */
final readonly class KeywordOperand extends Dto
{
    public function __construct(
        /**
         * The keyword that is the operand value.
         * 
         * @var 'empty'
         */
        public string $keyword,
    ) {
    }
}
