<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueTypeScreenSchemeMappingDoc
final readonly class IssueTypeScreenSchemeMapping extends Dto
{
    public function __construct(
        /**
         * The ID of the issue type or *default*.
         * Only issue types used in classic projects are accepted.
         * An entry for *default* must be provided and defines the mapping for all issue types without a screen scheme.
         */
        public string $issueTypeId,

        /**
         * The ID of the screen scheme.
         * Only screen schemes used in classic projects are accepted.
         */
        public string $screenSchemeId,
    ) {
    }
}
