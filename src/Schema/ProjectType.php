<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about a project type. */
final readonly class ProjectType extends Dto
{
    public function __construct(
        /** The color of the project type. */
        public ?string $color = null,

        /** The key of the project type's description. */
        public ?string $descriptionI18nKey = null,

        /** The formatted key of the project type. */
        public ?string $formattedKey = null,

        /** The icon of the project type. */
        public ?string $icon = null,

        /** The key of the project type. */
        public ?string $key = null,
    ) {
    }
}
