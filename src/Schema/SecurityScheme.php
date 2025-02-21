<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about a security scheme. */
final readonly class SecurityScheme extends Dto
{
    public function __construct(
        /** The ID of the default security level. */
        public ?int $defaultSecurityLevelId = null,

        /** The description of the issue security scheme. */
        public ?string $description = null,

        /** The ID of the issue security scheme. */
        public ?int $id = null,

        public ?array $levels = null,

        /** The name of the issue security scheme. */
        public ?string $name = null,

        /** The URL of the issue security scheme. */
        public ?string $self = null,
    ) {
    }
}
