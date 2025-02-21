<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A project category. */
final readonly class ProjectCategory extends Dto
{
    public function __construct(
        /** The description of the project category. */
        public ?string $description = null,

        /** The ID of the project category. */
        public ?string $id = null,

        /**
         * The name of the project category.
         * Required on create, optional on update.
         */
        public ?string $name = null,

        /** The URL of the project category. */
        public ?string $self = null,
    ) {
    }
}
