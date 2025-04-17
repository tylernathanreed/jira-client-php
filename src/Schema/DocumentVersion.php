<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The current version details of this workflow scheme. */
final class DocumentVersion extends Dto
{
    public function __construct(
        /** The version UUID. */
        public ?string $id = null,

        /** The version number. */
        public ?int $versionNumber = null,
    ) {
    }
}
