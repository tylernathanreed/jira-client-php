<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// SecuritySchemeLevelBeanDoc
final readonly class SecuritySchemeLevelBean extends Dto
{
    public function __construct(
        /**
         * The name of the issue security scheme level.
         * Must be unique.
         */
        public string $name,

        /** The description of the issue security scheme level. */
        public ?string $description = null,

        /**
         * Specifies whether the level is the default level.
         * False by default.
         */
        public ?bool $isDefault = null,

        /**
         * The list of level members which should be added to the issue security scheme level.
         * 
         * @var ?list<SecuritySchemeLevelMemberBean>
         */
        public ?array $members = null,
    ) {
    }
}
