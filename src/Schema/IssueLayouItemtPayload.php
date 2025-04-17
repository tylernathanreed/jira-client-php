<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Defines the payload to configure the issue layout item for a project. */
final class IssueLayouItemtPayload extends Dto
{
    public function __construct(
        public ?ProjectCreateResourceIdentifier $itemKey = null,

        /**
         * The item section type
         * 
         * @var 'content'|'primaryContext'|'secondaryContext'|null
         */
        public ?string $sectionType = null,

        /**
         * The item type.
         * Currently only support FIELD
         * 
         * @var 'FIELD'|null
         */
        public ?string $type = null,
    ) {
    }
}
