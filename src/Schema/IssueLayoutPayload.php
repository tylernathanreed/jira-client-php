<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Defines the payload to configure the issue layouts for a project. */
final class IssueLayoutPayload extends Dto
{
    public function __construct(
        public ?ProjectCreateResourceIdentifier $containerId = null,

        /**
         * The issue layout type
         * 
         * @var 'ISSUE_VIEW'|'ISSUE_CREATE'|'REQUEST_FORM'|null
         */
        public ?string $issueLayoutType = null,

        /**
         * The configuration of items in the issue layout
         * 
         * @var ?list<IssueLayouItemtPayload>
         */
        public ?array $items = null,

        public ?ProjectCreateResourceIdentifier $pcri = null,
    ) {
    }
}
