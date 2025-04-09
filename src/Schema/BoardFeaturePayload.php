<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** The payload for setting a board feature */
final readonly class BoardFeaturePayload extends Dto
{
    public function __construct(
        /**
         * The key of the feature
         * 
         * @var 'ESTIMATION'|'SPRINT'|null
         */
        public ?string $featureKey = null,

        /** Whether the feature should be turned on or off */
        public ?bool $state = null,
    ) {
    }
}
