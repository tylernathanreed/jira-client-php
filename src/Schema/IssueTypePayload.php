<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The payload for creating an issue type */
final class IssueTypePayload extends Dto
{
    public function __construct(
        /**
         * The avatar ID of the issue type.
         * Go to https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-avatars/\#api-rest-api-3-avatar-type-system-get to choose an avatarId existing in Jira
         */
        public ?int $avatarId = null,

        /** The description of the issue type */
        public ?string $description = null,

        /**
         * The hierarchy level of the issue type.
         * 0, 1, 2, 3 ..
         * n; Negative values for subtasks
         */
        public ?int $hierarchyLevel = null,

        /** The name of the issue type */
        public ?string $name = null,

        /**
         * The conflict strategy to use when the issue type already exists.
         * FAIL - Fail execution, this always needs to be unique; USE - Use the existing entity and ignore new entity parameters
         * 
         * @var 'FAIL'|'USE'|'NEW'|null
         */
        public ?string $onConflict = null,

        public ?ProjectCreateResourceIdentifier $pcri = null,
    ) {
    }
}
