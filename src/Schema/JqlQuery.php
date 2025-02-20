<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A parsed JQL query. */
final readonly class JqlQuery extends Dto
{
    public function __construct(
        public ?JqlQueryOrderByClause $orderBy = null,

        public ?JqlQueryClause $where = null,
    ) {
    }
}
