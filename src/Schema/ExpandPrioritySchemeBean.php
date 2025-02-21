<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A priority scheme with less fields to be used in for an API expand response. */
final readonly class ExpandPrioritySchemeBean extends Dto
{
    public function __construct(
        /** The ID of the priority scheme. */
        public ?string $id = null,

        /** The name of the priority scheme. */
        public ?string $name = null,

        /** The URL of the priority scheme. */
        public ?string $self = null,
    ) {
    }
}
