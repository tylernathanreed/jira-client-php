<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class WorkflowCreateValidateRequest extends Dto
{
    public function __construct(
        public WorkflowCreateRequest $payload,

        public ?ValidationOptionsForCreate $validationOptions = null,
    ) {
    }
}
