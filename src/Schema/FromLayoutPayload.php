<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** The payload for the layout details for the start end of a transition */
final readonly class FromLayoutPayload extends Dto
{
    public function __construct(
        /** The port that the transition can be made from */
        public ?int $fromPort = null,

        public ?ProjectCreateResourceIdentifier $status = null,

        /** The port that the transition goes to */
        public ?int $toPortOverride = null,
    ) {
    }
}
