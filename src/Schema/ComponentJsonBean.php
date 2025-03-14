<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class ComponentJsonBean extends Dto
{
    public function __construct(
        public ?string $ari = null,

        public ?string $description = null,

        public ?string $id = null,

        /** @var array<string,string> */
        public ?array $metadata = null,

        public ?string $name = null,

        public ?string $self = null,
    ) {
    }
}
