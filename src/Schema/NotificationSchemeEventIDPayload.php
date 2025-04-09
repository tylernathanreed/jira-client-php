<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** The event ID to use for reference in the payload */
final readonly class NotificationSchemeEventIDPayload extends Dto
{
    public function __construct(
        /**
         * The event ID to use for reference in the payload
         * 
         * @example '1'
         */
        public ?string $id = null,
    ) {
    }
}
