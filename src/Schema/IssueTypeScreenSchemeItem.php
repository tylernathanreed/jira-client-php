<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueTypeScreenSchemeItemDoc
final readonly class IssueTypeScreenSchemeItem extends Dto
{
    public function __construct(
        /**
         * The ID of the issue type or *default*.
         * Only issue types used in classic projects are accepted.
         * When creating an issue screen scheme, an entry for *default* must be provided and defines the mapping for all issue types without a screen scheme.
         * Otherwise, a *default* entry can't be provided.
         */
        public string $issueTypeId,

        /** The ID of the issue type screen scheme. */
        public string $issueTypeScreenSchemeId,

        /** The ID of the screen scheme. */
        public string $screenSchemeId,
    ) {
    }
}
