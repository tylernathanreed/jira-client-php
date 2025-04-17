<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Identifier for a field for example FIELD\_ID. */
final class FieldIdentifierObject extends Dto
{
    public function __construct(
        public string $type,

        public ?string $identifier = null,
    ) {
    }
}
