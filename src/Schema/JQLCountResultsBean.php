<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JQLCountResultsBeanDoc
final readonly class JQLCountResultsBean extends Dto
{
    public function __construct(
        /** Number of issues matching JQL query. */
        public ?int $count = null,
    ) {
    }
}
