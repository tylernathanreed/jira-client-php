<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Meta data describing the `issues` context variable. */
final class IssuesMetaBean extends Dto
{
    public function __construct(
        public ?IssuesJqlMetaDataBean $jql = null,
    ) {
    }
}
