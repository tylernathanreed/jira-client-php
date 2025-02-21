<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ColumnItemDoc
final readonly class ColumnItem extends Dto
{
    public function __construct(
        /** The issue navigator column label. */
        public ?string $label = null,

        /** The issue navigator column value. */
        public ?string $value = null,
    ) {
    }
}
