<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The description of the page of issues loaded by the provided JQL query.This bean will be replacing IssuesJqlMetaDataBean bean as part of new `evaluate` endpoint */
final class JExpEvaluateIssuesJqlMetaDataBean extends Dto
{
    public function __construct(
        /** Next Page token for the next page of issues. */
        public string $nextPageToken,
    ) {
    }
}
