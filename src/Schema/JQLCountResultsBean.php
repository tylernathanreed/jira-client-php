<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class JQLCountResultsBean extends Dto
{
    public function __construct(
        /** Number of issues matching JQL query. */
        public ?int $count = null,
    ) {
    }
}
