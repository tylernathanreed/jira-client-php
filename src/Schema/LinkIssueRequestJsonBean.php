<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

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
