<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class ResolutionJsonBean extends Dto
{
    public function __construct(
        public ?bool $default = null,

        public ?string $description = null,

        public ?string $iconUrl = null,

        public ?string $id = null,

        public ?string $name = null,

        public ?string $self = null,
    ) {
    }
}
