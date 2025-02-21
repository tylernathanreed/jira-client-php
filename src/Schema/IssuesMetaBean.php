<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssuesMetaBeanDoc
final readonly class IssuesMetaBean extends Dto
{
    public function __construct(
        public ?IssuesJqlMetaDataBean $jql = null,
    ) {
    }
}
