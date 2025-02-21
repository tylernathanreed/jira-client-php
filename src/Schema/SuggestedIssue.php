<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** An issue suggested for use in the issue picker auto-completion. */
final readonly class SuggestedIssue extends Dto
{
    public function __construct(
        /** The ID of the issue. */
        public ?int $id = null,

        /** The URL of the issue type's avatar. */
        public ?string $img = null,

        /** The key of the issue. */
        public ?string $key = null,

        /** The key of the issue in HTML format. */
        public ?string $keyHtml = null,

        /** The phrase containing the query string in HTML format, with the string highlighted with HTML bold tags. */
        public ?string $summary = null,

        /** The phrase containing the query string, as plain text. */
        public ?string $summaryText = null,
    ) {
    }
}
