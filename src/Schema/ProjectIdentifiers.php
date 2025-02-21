<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ProjectIdentifiersDoc
final readonly class ProjectIdentifiers extends Dto
{
    public function __construct(
        /** The ID of the created project. */
        public int $id,

        /** The key of the created project. */
        public string $key,

        /** The URL of the created project. */
        public string $self,
    ) {
    }
}
