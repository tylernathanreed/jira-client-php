<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * A list of issues and their respective properties to set or update.
 * See "Entity properties" for more information.
 * 
 * @link https://developer.atlassian.com/cloud/jira/platform/jira-entity-properties/
 */
final readonly class MultiIssueEntityProperties extends Dto
{
    public function __construct(
        /**
         * A list of issue IDs and their respective properties.
         * 
         * @var ?list<IssueEntityPropertiesForMultiUpdate>
         */
        public ?array $issues = null,
    ) {
    }
}
