<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class WorkflowCreateValidateRequest extends Dto
{
    public function __construct(
        public WorkflowCreateRequest $payload,

        public ?ValidationOptionsForCreate $validationOptions = null,
    ) {
    }
}
