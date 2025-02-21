<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueCommentListRequestBeanDoc
final readonly class IssueCommentListRequestBean extends Dto
{
    public function __construct(
        /**
         * The list of comment IDs.
         * A maximum of 1000 IDs can be specified.
         * 
         * @var list<int>
         */
        public array $ids,
    ) {
    }
}
