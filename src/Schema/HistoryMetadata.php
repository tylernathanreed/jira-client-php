<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// HistoryMetadataDoc
final readonly class HistoryMetadata extends Dto
{
    public function __construct(
        /** The activity described in the history record. */
        public ?string $activityDescription = null,

        /** The key of the activity described in the history record. */
        public ?string $activityDescriptionKey = null,

        /** Details of the user whose action created the history record. */
        public ?HistoryMetadataParticipant $actor = null,

        /** Details of the cause that triggered the creation the history record. */
        public ?HistoryMetadataParticipant $cause = null,

        /** The description of the history record. */
        public ?string $description = null,

        /** The description key of the history record. */
        public ?string $descriptionKey = null,

        /** The description of the email address associated the history record. */
        public ?string $emailDescription = null,

        /** The description key of the email address associated the history record. */
        public ?string $emailDescriptionKey = null,

        /**
         * Additional arbitrary information about the history record.
         * 
         * @var array<string,string>
         */
        public ?array $extraData = null,

        /** Details of the system that generated the history record. */
        public ?HistoryMetadataParticipant $generator = null,

        /** The type of the history record. */
        public ?string $type = null,
    ) {
    }
}
