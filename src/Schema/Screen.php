<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ScreenDoc
final readonly class Screen extends Dto
{
    public function __construct(
        /** The description of the screen. */
        public ?string $description = null,

        /** The ID of the screen. */
        public ?int $id = null,

        /** The name of the screen. */
        public ?string $name = null,

        /** The scope of the screen. */
        public ?Scope $scope = null,
    ) {
    }
}
