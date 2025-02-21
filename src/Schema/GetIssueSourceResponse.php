<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class GetIssueSourceResponse extends Dto
{
    public function __construct(
        /**
         * The issue source type.
         * This is "Board", "Project" or "Filter".
         * 
         * @var 'Board'|'Project'|'Filter'|'Custom'
         */
        public string $type,

        /**
         * The issue source value.
         * This is a board ID if the type is "Board", a project ID if the type is "Project" or a filter ID if the type is "Filter".
         */
        public int $value,
    ) {
    }
}
