<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CreateIssueSourceRequestDoc
final readonly class CreateIssueSourceRequest extends Dto
{
    public function __construct(
        /**
         * The issue source type.
         * This must be "Board", "Project" or "Filter".
         * 
         * @var 'Board'|'Project'|'Filter'
         */
        public string $type,

        /**
         * The issue source value.
         * This must be a board ID if the type is "Board", a project ID if the type is "Project" or a filter ID if the type is "Filter".
         */
        public int $value,
    ) {
    }
}
