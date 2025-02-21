<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// UpdatedProjectCategoryDoc
final readonly class UpdatedProjectCategory extends Dto
{
    public function __construct(
        /** The name of the project category. */
        public ?string $description = null,

        /** The ID of the project category. */
        public ?string $id = null,

        /** The description of the project category. */
        public ?string $name = null,

        /** The URL of the project category. */
        public ?string $self = null,
    ) {
    }
}
