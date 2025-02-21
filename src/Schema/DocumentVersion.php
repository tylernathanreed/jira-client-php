<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// DocumentVersionDoc
final readonly class DocumentVersion extends Dto
{
    public function __construct(
        /** The version UUID. */
        public ?string $id = null,

        /** The version number. */
        public ?int $versionNumber = null,
    ) {
    }
}
