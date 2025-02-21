<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class SimpleApplicationPropertyBean extends Dto
{
    public function __construct(
        /** The ID of the application property. */
        public ?string $id = null,

        /** The new value. */
        public ?string $value = null,
    ) {
    }
}
