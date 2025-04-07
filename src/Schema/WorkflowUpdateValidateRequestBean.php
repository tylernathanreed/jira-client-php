<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class WorkflowUpdateValidateRequestBean extends Dto
{
    public function __construct(
        public WorkflowUpdateRequest $payload,

        public ?ValidationOptionsForUpdate $validationOptions = null,
    ) {
    }
}
