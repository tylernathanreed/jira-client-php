<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Property key details. */
final class PropertyKey extends Dto
{
    public function __construct(
        /** The key of the property. */
        public ?string $key = null,

        /** The URL of the property. */
        public ?string $self = null,
    ) {
    }
}
