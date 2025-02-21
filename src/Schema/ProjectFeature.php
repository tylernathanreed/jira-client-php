<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of a project feature. */
final readonly class ProjectFeature extends Dto
{
    public function __construct(
        /** The key of the feature. */
        public ?string $feature = null,

        /** URI for the image representing the feature. */
        public ?string $imageUri = null,

        /** Localized display description for the feature. */
        public ?string $localisedDescription = null,

        /** Localized display name for the feature. */
        public ?string $localisedName = null,

        /**
         * List of keys of the features required to enable the feature.
         * 
         * @var ?list<string>
         */
        public ?array $prerequisites = null,

        /** The ID of the project. */
        public ?int $projectId = null,

        /**
         * The state of the feature.
         * When updating the state of a feature, only ENABLED and DISABLED are supported.
         * Responses can contain all values
         * 
         * @var 'ENABLED'|'DISABLED'|'COMING_SOON'|null
         */
        public ?string $state = null,

        /** Whether the state of the feature can be updated. */
        public ?bool $toggleLocked = null,
    ) {
    }
}
