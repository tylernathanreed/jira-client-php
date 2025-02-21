<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A field auto-complete suggestion. */
final readonly class AutoCompleteSuggestion extends Dto
{
    public function __construct(
        /**
         * The display name of a suggested item.
         * If `fieldValue` or `predicateValue` are provided, the matching text is highlighted with the HTML bold tag.
         */
        public ?string $displayName = null,

        /** The value of a suggested item. */
        public ?string $value = null,
    ) {
    }
}
