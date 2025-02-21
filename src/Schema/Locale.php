<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of a locale. */
final readonly class Locale extends Dto
{
    public function __construct(
        /**
         * The locale code.
         * The Java the locale format is used: a two character language code (ISO 639), an underscore, and two letter country code (ISO 3166).
         * For example, en\_US represents a locale of English (United States).
         * Required on create.
         */
        public ?string $locale = null,
    ) {
    }
}
