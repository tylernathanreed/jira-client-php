<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// OperationMessageDoc
final readonly class OperationMessage extends Dto
{
    public function __construct(
        /** The human-readable message that describes the result. */
        public string $message,

        /** The status code of the response. */
        public int $statusCode,
    ) {
    }
}
