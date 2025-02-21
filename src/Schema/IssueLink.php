<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueLinkDoc
final readonly class IssueLink extends Dto
{
    public function __construct(
        /**
         * Provides details about the linked issue.
         * If presenting this link in a user interface, use the `inward` field of the issue link type to label the link.
         */
        public LinkedIssue $inwardIssue,

        /**
         * Provides details about the linked issue.
         * If presenting this link in a user interface, use the `outward` field of the issue link type to label the link.
         */
        public LinkedIssue $outwardIssue,

        /** The type of link between the issues. */
        public IssueLinkType $type,

        /** The ID of the issue link. */
        public ?string $id = null,

        /** The URL of the issue link. */
        public ?string $self = null,
    ) {
    }
}
