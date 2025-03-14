<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A list of issues suggested for use in auto-completion. */
final readonly class IssuePickerSuggestions extends Dto
{
    public function __construct(
        /**
         * A list of issues for an issue type suggested for use in auto-completion.
         * 
         * @var ?list<IssuePickerSuggestionsIssueType>
         */
        public ?array $sections = null,
    ) {
    }
}
