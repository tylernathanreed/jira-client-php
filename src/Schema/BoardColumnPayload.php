<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The payload for creating a board column */
final class BoardColumnPayload extends Dto
{
    public function __construct(
        /** The maximum issue constraint for the column */
        public ?int $maximumIssueConstraint = null,

        /** The minimum issue constraint for the column */
        public ?int $minimumIssueConstraint = null,

        /**
         * The name of the column
         * 
         * @example 'TODO'
         */
        public ?string $name = null,

        /**
         * The status IDs for the column
         * 
         * @var ?list<ProjectCreateResourceIdentifier>
         * 
         * @example 'pcri:status:ref:done'
         */
        public ?array $statusIds = null,
    ) {
    }
}
