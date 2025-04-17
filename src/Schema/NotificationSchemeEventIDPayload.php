<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The event ID to use for reference in the payload */
final class NotificationSchemeEventIDPayload extends Dto
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
