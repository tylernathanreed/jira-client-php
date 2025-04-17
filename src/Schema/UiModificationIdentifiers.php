<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Identifiers for a UI modification. */
final class UiModificationIdentifiers extends Dto
{
    public function __construct(
        /** The ID of the UI modification. */
        public string $id,

        /** The URL of the UI modification. */
        public string $self,
    ) {
    }
}
