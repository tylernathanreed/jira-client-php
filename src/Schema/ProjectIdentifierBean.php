<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The identifiers for a project. */
final class ProjectIdentifierBean extends Dto
{
    public function __construct(
        /** The ID of the project. */
        public ?int $id = null,

        /** The key of the project. */
        public ?string $key = null,
    ) {
    }
}
