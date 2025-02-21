<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Meta data describing the `issues` context variable.This bean will be replacing IssuesMetaBean bean as part of new `evaluate` endpoint */
final readonly class JExpEvaluateIssuesMetaBean extends Dto
{
    public function __construct(
        public ?JExpEvaluateIssuesJqlMetaDataBean $jql = null,
    ) {
    }
}
