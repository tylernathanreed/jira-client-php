<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ApplicationRoleDoc
final readonly class ApplicationRole extends Dto
{
    public function __construct(
        /**
         * The groups that are granted default access for this application role.
         * As a group's name can change, use of `defaultGroupsDetails` is recommended to identify a groups.
         * 
         * @var ?list<string>
         */
        public ?array $defaultGroups = null,

        /**
         * The groups that are granted default access for this application role.
         * 
         * @var ?list<GroupName>
         */
        public ?array $defaultGroupsDetails = null,

        /** Deprecated. */
        public ?bool $defined = null,

        /**
         * The groups associated with the application role.
         * 
         * @var ?list<GroupName>
         */
        public ?array $groupDetails = null,

        /**
         * The groups associated with the application role.
         * As a group's name can change, use of `groupDetails` is recommended to identify a groups.
         * 
         * @var ?list<string>
         */
        public ?array $groups = null,

        public ?bool $hasUnlimitedSeats = null,

        /** The key of the application role. */
        public ?string $key = null,

        /** The display name of the application role. */
        public ?string $name = null,

        /** The maximum count of users on your license. */
        public ?int $numberOfSeats = null,

        /** Indicates if the application role belongs to Jira platform (`jira-core`). */
        public ?bool $platform = null,

        /** The count of users remaining on your license. */
        public ?int $remainingSeats = null,

        /** Determines whether this application role should be selected by default on user creation. */
        public ?bool $selectedByDefault = null,

        /** The number of users counting against your license. */
        public ?int $userCount = null,

        /**
         * The "type of users" being counted against your license.
         * 
         * @link https://confluence.atlassian.com/x/lRW3Ng
         */
        public ?string $userCountDescription = null,
    ) {
    }
}
