<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** Field association for example PROJECT\_ID. */
final readonly class AssociationContextObject extends Dto
{
    public function __construct(
        public string $type,

        public ?int $identifier = null,
    ) {
    }
}
