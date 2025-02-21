<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * An issue ID with entity property values.
 * See "Entity properties" for more information.
 * 
 * @link https://developer.atlassian.com/cloud/jira/platform/jira-entity-properties/
 */
final readonly class IssueEntityPropertiesForMultiUpdate extends Dto
{
    public function __construct(
        /** The ID of the issue. */
        public ?int $issueID = null,

        /**
         * Entity properties to set on the issue.
         * The maximum length of an issue property value is 32768 characters.
         */
        public ?JsonNode $properties = null,
    ) {
    }
}
