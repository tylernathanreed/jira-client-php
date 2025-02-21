<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of an avatar. */
final readonly class Avatar extends Dto
{
    public function __construct(
        /** The ID of the avatar. */
        public string $id,

        /**
         * The file name of the avatar icon.
         * Returned for system avatars.
         */
        public ?string $fileName = null,

        /** Whether the avatar can be deleted. */
        public ?bool $isDeletable = null,

        /**
         * Whether the avatar is used in Jira.
         * For example, shown as a project's avatar.
         */
        public ?bool $isSelected = null,

        /** Whether the avatar is a system avatar. */
        public ?bool $isSystemAvatar = null,

        /**
         * The owner of the avatar.
         * For a system avatar the owner is null (and nothing is returned).
         * For non-system avatars this is the appropriate identifier, such as the ID for a project or the account ID for a user.
         */
        public ?string $owner = null,

        /**
         * The list of avatar icon URLs.
         * 
         * @var array<string,string>
         */
        public ?array $urls = null,
    ) {
    }
}
