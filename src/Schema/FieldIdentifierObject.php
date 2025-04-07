<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** Identifier for a field for example FIELD\_ID. */
final readonly class FieldIdentifierObject extends Dto
{
    public function __construct(
        public string $type,

        public ?string $identifier = null,
    ) {
    }
}
