<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class IssueTypeCreateBean extends Dto
{
    public function __construct(
        /**
         * The unique name for the issue type.
         * The maximum length is 60 characters.
         */
        public string $name,

        /** The description of the issue type. */
        public ?string $description = null,

        /**
         * The hierarchy level of the issue type.
         * Use:
         * 
         *  - `-1` for Subtask
         *  - `0` for Base
         * 
         * Defaults to `0`.
         */
        public ?int $hierarchyLevel = null,

        /**
         * Deprecated.
         * Use `hierarchyLevel` instead.
         * See the "deprecation notice" for details
         * 
         * Whether the issue type is `subtype` or `standard`.
         * Defaults to `standard`.
         * 
         * @link https://community.developer.atlassian.com/t/deprecation-of-the-epic-link-parent-link-and-other-related-fields-in-rest-apis-and-webhooks/54048
         * 
         * @var 'subtask'|'standard'|null
         */
        public ?string $type = null,
    ) {
    }
}
