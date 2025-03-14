<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of the order-by JQL clause. */
final readonly class JqlQueryOrderByClause extends Dto
{
    public function __construct(
        /**
         * The list of order-by clause fields and their ordering directives.
         * 
         * @var list<JqlQueryOrderByClauseElement>
         */
        public array $fields,
    ) {
    }
}
