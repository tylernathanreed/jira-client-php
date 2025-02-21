<?php

namespace Jira\Client\Schema;

use DateTimeImmutable;
use Jira\Client\Dto;

// WorklogDoc
final readonly class Worklog extends Dto
{
    public function __construct(
        /** Details of the user who created the worklog. */
        public ?UserDetails $author = null,

        /**
         * A comment about the worklog in "Atlassian Document Format".
         * Optional when creating or updating a worklog.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/apis/document/structure/
         */
        public mixed $comment = null,

        /** The datetime on which the worklog was created. */
        public ?DateTimeImmutable $created = null,

        /** The ID of the worklog record. */
        public ?string $id = null,

        /** The ID of the issue this worklog is for. */
        public ?string $issueId = null,

        /**
         * Details of properties for the worklog.
         * Optional when creating or updating a worklog.
         * 
         * @var ?list<EntityProperty>
         */
        public ?array $properties = null,

        /** The URL of the worklog item. */
        public ?string $self = null,

        /**
         * The datetime on which the worklog effort was started.
         * Required when creating a worklog.
         * Optional when updating a worklog.
         */
        public ?DateTimeImmutable $started = null,

        /**
         * The time spent working on the issue as days (\#d), hours (\#h), or minutes (\#m or \#).
         * Required when creating a worklog if `timeSpentSeconds` isn't provided.
         * Optional when updating a worklog.
         * Cannot be provided if `timeSpentSecond` is provided.
         */
        public ?string $timeSpent = null,

        /**
         * The time in seconds spent working on the issue.
         * Required when creating a worklog if `timeSpent` isn't provided.
         * Optional when updating a worklog.
         * Cannot be provided if `timeSpent` is provided.
         */
        public ?int $timeSpentSeconds = null,

        /** Details of the user who last updated the worklog. */
        public ?UserDetails $updateAuthor = null,

        /** The datetime on which the worklog was last updated. */
        public ?DateTimeImmutable $updated = null,

        /**
         * Details about any restrictions in the visibility of the worklog.
         * Optional when creating or updating a worklog.
         */
        public ?Visibility $visibility = null,
    ) {
    }
}
