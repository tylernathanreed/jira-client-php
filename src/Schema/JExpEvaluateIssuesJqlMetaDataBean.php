<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JExpEvaluateIssuesJqlMetaDataBeanDoc
final readonly class JExpEvaluateIssuesJqlMetaDataBean extends Dto
{
    public function __construct(
        /** Next Page token for the next page of issues. */
        public string $nextPageToken,
    ) {
    }
}
