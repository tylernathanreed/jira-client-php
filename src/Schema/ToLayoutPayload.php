<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The payload for the layout details for the destination end of a transition */
final readonly class ToLayoutPayload extends Dto
{
    public function __construct(
        /**
         * Defines where the transition line will be connected to a status.
         * Port 0 to 7 are acceptable values.
         * 
         * @example 1
         */
        public ?int $port = null,

        public ?ProjectCreateResourceIdentifier $status = null,
    ) {
    }
}
