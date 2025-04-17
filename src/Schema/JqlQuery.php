<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** A parsed JQL query. */
final class JqlQuery extends Dto
{
    public function __construct(
        public ?JqlQueryOrderByClause $orderBy = null,

        public ?JqlQueryClause $where = null,
    ) {
    }
}
