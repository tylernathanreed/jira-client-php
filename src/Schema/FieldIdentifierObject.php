<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Identifier for a field for example FIELD\_ID. */
final readonly class FieldIdentifierObject extends Dto
{
    public function __construct(
        public string $type,

        /** @var array<string,mixed> */
        public ?array $identifier = null,
    ) {
    }
}
