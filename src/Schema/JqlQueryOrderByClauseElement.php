<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JqlQueryOrderByClauseElementDoc
final readonly class JqlQueryOrderByClauseElement extends Dto
{
    public function __construct(
        public JqlQueryField $field,

        /**
         * The direction in which to order the results.
         * 
         * @var 'asc'|'desc'|null
         */
        public ?string $direction = null,
    ) {
    }
}
