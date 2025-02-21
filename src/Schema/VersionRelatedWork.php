<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// VersionRelatedWorkDoc
final readonly class VersionRelatedWork extends Dto
{
    public function __construct(
        /** The category of the related work */
        public string $category,

        /**
         * The ID of the issue associated with the related work (if there is one).
         * Cannot be updated via the Rest API.
         */
        public ?int $issueId = null,

        /**
         * The id of the related work.
         * For the native release note related work item, this will be null, and Rest API does not support updating it.
         */
        public ?string $relatedWorkId = null,

        /** The title of the related work */
        public ?string $title = null,

        /**
         * The URL of the related work.
         * Will be null for the native release note related work item, but is otherwise required.
         */
        public ?string $url = null,
    ) {
    }
}
