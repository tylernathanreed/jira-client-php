<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssuePickerSuggestionsIssueTypeDoc
final readonly class IssuePickerSuggestionsIssueType extends Dto
{
    public function __construct(
        /** The ID of the type of issues suggested for use in auto-completion. */
        public ?string $id = null,

        /**
         * A list of issues suggested for use in auto-completion.
         * 
         * @var ?list<SuggestedIssue>
         */
        public ?array $issues = null,

        /** The label of the type of issues suggested for use in auto-completion. */
        public ?string $label = null,

        /** If no issue suggestions are found, returns a message indicating no suggestions were found, */
        public ?string $msg = null,

        /** If issue suggestions are found, returns a message indicating the number of issues suggestions found and returned. */
        public ?string $sub = null,
    ) {
    }
}
