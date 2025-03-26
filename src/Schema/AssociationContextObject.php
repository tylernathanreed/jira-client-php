<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Field association for example PROJECT\_ID. */
final readonly class AssociationContextObject extends Dto
{
    public function __construct(
        public string $type,

        /** @var array<string,mixed> */
        public ?array $identifier = null,
    ) {
    }
}
