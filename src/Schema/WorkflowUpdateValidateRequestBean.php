<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class WorkflowUpdateValidateRequestBean extends Dto
{
    public function __construct(
        public WorkflowUpdateRequest $payload,

        public ?ValidationOptionsForUpdate $validationOptions = null,
    ) {
    }
}
