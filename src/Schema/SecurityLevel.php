<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of an issue level security item. */
final readonly class SecurityLevel extends Dto
{
    public function __construct(
        /** The description of the issue level security item. */
        public ?string $description = null,

        /** The ID of the issue level security item. */
        public ?string $id = null,

        /** Whether the issue level security item is the default. */
        public ?bool $isDefault = null,

        /** The ID of the issue level security scheme. */
        public ?string $issueSecuritySchemeId = null,

        /** The name of the issue level security item. */
        public ?string $name = null,

        /** The URL of the issue level security item. */
        public ?string $self = null,
    ) {
    }
}
