<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ResolutionDoc
final readonly class Resolution extends Dto
{
    public function __construct(
        /** The description of the issue resolution. */
        public ?string $description = null,

        /** The ID of the issue resolution. */
        public ?string $id = null,

        /** The name of the issue resolution. */
        public ?string $name = null,

        /** The URL of the issue resolution. */
        public ?string $self = null,
    ) {
    }
}
