<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about the operations available in this version. */
final readonly class SimpleLink extends Dto
{
    public function __construct(
        public ?string $href = null,

        public ?string $iconClass = null,

        public ?string $id = null,

        public ?string $label = null,

        public ?string $styleClass = null,

        public ?string $title = null,

        public ?int $weight = null,
    ) {
    }
}
