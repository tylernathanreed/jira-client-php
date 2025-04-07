<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** The identifiers for a project. */
final readonly class ProjectIdentifierBean extends Dto
{
    public function __construct(
        /** The ID of the project. */
        public ?int $id = null,

        /** The key of the project. */
        public ?string $key = null,
    ) {
    }
}
