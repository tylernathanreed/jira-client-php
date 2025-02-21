<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IdOrKeyBeanDoc
final readonly class IdOrKeyBean extends Dto
{
    public function __construct(
        /** The ID of the referenced item. */
        public ?int $id = null,

        /** The key of the referenced item. */
        public ?string $key = null,
    ) {
    }
}
