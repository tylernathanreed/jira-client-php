<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ConfigurationDoc
final readonly class Configuration extends Dto
{
    public function __construct(
        /** Whether the ability to add attachments to issues is enabled. */
        public ?bool $attachmentsEnabled = null,

        /** Whether the ability to link issues is enabled. */
        public ?bool $issueLinkingEnabled = null,

        /** Whether the ability to create subtasks for issues is enabled. */
        public ?bool $subTasksEnabled = null,

        /** The configuration of time tracking. */
        public ?TimeTrackingConfiguration $timeTrackingConfiguration = null,

        /**
         * Whether the ability to track time is enabled.
         * This property is deprecated.
         */
        public ?bool $timeTrackingEnabled = null,

        /**
         * Whether the ability to create unassigned issues is enabled.
         * See "Configuring Jira application options" for details.
         * 
         * @link https://confluence.atlassian.com/x/uYXKM
         */
        public ?bool $unassignedIssuesAllowed = null,

        /**
         * Whether the ability for users to vote on issues is enabled.
         * See "Configuring Jira application options" for details.
         * 
         * @link https://confluence.atlassian.com/x/uYXKM
         */
        public ?bool $votingEnabled = null,

        /**
         * Whether the ability for users to watch issues is enabled.
         * See "Configuring Jira application options" for details.
         * 
         * @link https://confluence.atlassian.com/x/uYXKM
         */
        public ?bool $watchingEnabled = null,
    ) {
    }
}
