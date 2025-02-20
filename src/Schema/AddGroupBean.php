<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class AddGroupBean extends Dto
{
    public function __construct(
        /** The name of the group. */
        public string $name,
    ) {
    }
}
