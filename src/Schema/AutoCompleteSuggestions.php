<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The results from a JQL query. */
final readonly class AutoCompleteSuggestions extends Dto
{
    public function __construct(
        /**
         * The list of suggested item.
         * 
         * @var ?list<AutoCompleteSuggestion>
         */
        public ?array $results = null,
    ) {
    }
}
