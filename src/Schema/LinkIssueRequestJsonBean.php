<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// LinkIssueRequestJsonBeanDoc
final readonly class LinkIssueRequestJsonBean extends Dto
{
    public function __construct(
        public LinkedIssue $inwardIssue,

        public LinkedIssue $outwardIssue,

        public IssueLinkType $type,

        public ?Comment $comment = null,
    ) {
    }
}
