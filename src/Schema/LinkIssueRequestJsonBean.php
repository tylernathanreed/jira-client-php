<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class LinkIssueRequestJsonBean extends Dto
{
    public function __construct(
        public LinkedIssue $inwardIssue,

        public LinkedIssue $outwardIssue,

        public IssueLinkType $type,

        public ?Comment $comment = null,
    ) {
    }
}
