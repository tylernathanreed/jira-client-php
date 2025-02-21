<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueLinkTypeDoc
final readonly class IssueLinkType extends Dto
{
    public function __construct(
        /**
         * The ID of the issue link type and is used as follows:
         * 
         *  - In the " issueLink" resource it is the type of issue link.
         * Required on create when `name` isn't provided.
         * Otherwise, read only
         *  - In the " issueLinkType" resource it is read only.
         */
        public ?string $id = null,

        /**
         * The description of the issue link type inward link and is used as follows:
         * 
         *  - In the " issueLink" resource it is read only
         *  - In the " issueLinkType" resource it is required on create and optional on update.
         * Otherwise, read only.
         */
        public ?string $inward = null,

        /**
         * The name of the issue link type and is used as follows:
         * 
         *  - In the " issueLink" resource it is the type of issue link.
         * Required on create when `id` isn't provided.
         * Otherwise, read only
         *  - In the " issueLinkType" resource it is required on create and optional on update.
         * Otherwise, read only.
         */
        public ?string $name = null,

        /**
         * The description of the issue link type outward link and is used as follows:
         * 
         *  - In the " issueLink" resource it is read only
         *  - In the " issueLinkType" resource it is required on create and optional on update.
         * Otherwise, read only.
         */
        public ?string $outward = null,

        /**
         * The URL of the issue link type.
         * Read only.
         */
        public ?string $self = null,
    ) {
    }
}
