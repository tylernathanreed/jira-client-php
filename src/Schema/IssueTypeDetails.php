<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about an issue type. */
final readonly class IssueTypeDetails extends Dto
{
    public function __construct(
        /** The ID of the issue type's avatar. */
        public ?int $avatarId = null,

        /** The description of the issue type. */
        public ?string $description = null,

        /** Unique ID for next-gen projects. */
        public ?string $entityId = null,

        /** Hierarchy level of the issue type. */
        public ?int $hierarchyLevel = null,

        /** The URL of the issue type's avatar. */
        public ?string $iconUrl = null,

        /** The ID of the issue type. */
        public ?string $id = null,

        /** The name of the issue type. */
        public ?string $name = null,

        /** Details of the next-gen projects the issue type is available in. */
        public ?Scope $scope = null,

        /** The URL of these issue type details. */
        public ?string $self = null,

        /** Whether this issue type is used to create subtasks. */
        public ?bool $subtask = null,
    ) {
    }
}
