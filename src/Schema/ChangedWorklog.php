<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of a changed worklog. */
final readonly class ChangedWorklog extends Dto
{
    public function __construct(
        /**
         * Details of properties associated with the change.
         * 
         * @var ?list<EntityProperty>
         */
        public ?array $properties = null,

        /** The datetime of the change. */
        public ?int $updatedTime = null,

        /** The ID of the worklog. */
        public ?int $worklogId = null,
    ) {
    }
}
