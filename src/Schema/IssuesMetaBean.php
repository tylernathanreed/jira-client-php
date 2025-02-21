<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Meta data describing the `issues` context variable. */
final readonly class IssuesMetaBean extends Dto
{
    public function __construct(
        public ?IssuesJqlMetaDataBean $jql = null,
    ) {
    }
}
