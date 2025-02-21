<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ContextDoc
final readonly class Context extends Dto
{
    public function __construct(
        /** The ID of the context. */
        public ?int $id = null,

        /** The name of the context. */
        public ?string $name = null,

        /** The scope of the context. */
        public ?Scope $scope = null,
    ) {
    }
}
