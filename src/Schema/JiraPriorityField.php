<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class JiraPriorityField extends Dto
{
    public function __construct(
        public string $priorityId,
    ) {
    }
}
