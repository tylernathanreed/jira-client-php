<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Classification mapping for classifications in source issues to respective target classification. */
final readonly class TargetClassification extends Dto
{
    public function __construct(
        /**
         * An object with the key as the ID of the target classification and value with the list of the IDs of the current source classifications.
         * 
         * @var array<string,list<string>>
         */
        public array $classifications,

        /** ID of the source issueType to which issues present in `issueIdOrKeys` belongs. */
        public ?string $issueType = null,

        /** ID or key of the source project to which issues present in `issueIdOrKeys` belongs. */
        public ?string $projectKeyOrId = null,
    ) {
    }
}
