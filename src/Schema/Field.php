<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of a field. */
final readonly class Field extends Dto
{
    public function __construct(
        /** The ID of the field. */
        public string $id,

        /** The name of the field. */
        public string $name,

        public JsonTypeBean $schema,

        /** Number of contexts where the field is used. */
        public ?int $contextsCount = null,

        /** The description of the field. */
        public ?string $description = null,

        /** Whether the field is locked. */
        public ?bool $isLocked = null,

        /** Whether the field is shown on screen or not. */
        public ?bool $isUnscreenable = null,

        /** The key of the field. */
        public ?string $key = null,

        public ?FieldLastUsed $lastUsed = null,

        /** Number of projects where the field is used. */
        public ?int $projectsCount = null,

        /** Number of screens where the field is used. */
        public ?int $screensCount = null,

        /**
         * The searcher key of the field.
         * Returned for custom fields.
         */
        public ?string $searcherKey = null,

        /** The stable ID of the field. */
        public ?string $stableId = null,
    ) {
    }
}
