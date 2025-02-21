<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A status category. */
final readonly class StatusCategory extends Dto
{
    public function __construct(
        /** The name of the color used to represent the status category. */
        public ?string $colorName = null,

        /** The ID of the status category. */
        public ?int $id = null,

        /** The key of the status category. */
        public ?string $key = null,

        /** The name of the status category. */
        public ?string $name = null,

        /** The URL of the status category. */
        public ?string $self = null,
    ) {
    }
}
