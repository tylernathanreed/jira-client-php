<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Field association for example PROJECT\_ID. */
final class AssociationContextObject extends Dto
{
    public function __construct(
        public string $type,

        public ?int $identifier = null,
    ) {
    }
}
