<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** List of Issue Ids Or Keys that are to be archived or unarchived */
final class IssueArchivalSyncRequest extends Dto
{
    public function __construct(
        /** @var ?list<string> */
        public ?array $issueIdsOrKeys = null,
    ) {
    }
}
