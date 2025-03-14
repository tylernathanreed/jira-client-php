<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Identifiers for a UI modification. */
final readonly class UiModificationIdentifiers extends Dto
{
    public function __construct(
        /** The ID of the UI modification. */
        public string $id,

        /** The URL of the UI modification. */
        public string $self,
    ) {
    }
}
