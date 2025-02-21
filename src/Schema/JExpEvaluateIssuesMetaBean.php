<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JExpEvaluateIssuesMetaBeanDoc
final readonly class JExpEvaluateIssuesMetaBean extends Dto
{
    public function __construct(
        public ?JExpEvaluateIssuesJqlMetaDataBean $jql = null,
    ) {
    }
}
