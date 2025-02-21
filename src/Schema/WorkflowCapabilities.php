<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowCapabilitiesDoc
final readonly class WorkflowCapabilities extends Dto
{
    public function __construct(
        /**
         * The Connect provided ecosystem rules available.
         * 
         * @var ?list<AvailableWorkflowConnectRule>
         */
        public ?array $connectRules = null,

        /**
         * The scope of the workflow capabilities.
         * `GLOBAL` for company-managed projects and `PROJECT` for team-managed projects.
         * 
         * @var 'PROJECT'|'GLOBAL'|null
         */
        public ?string $editorScope = null,

        /**
         * The Forge provided ecosystem rules available.
         * 
         * @var ?list<AvailableWorkflowForgeRule>
         */
        public ?array $forgeRules = null,

        /**
         * The types of projects that this capability set is available for.
         * 
         * @var ?list<string>
         */
        public ?array $projectTypes = null,

        /**
         * The Atlassian provided system rules available.
         * 
         * @var ?list<AvailableWorkflowSystemRule>
         */
        public ?array $systemRules = null,

        /**
         * The trigger rules available.
         * 
         * @var ?list<AvailableWorkflowTriggers>
         */
        public ?array $triggerRules = null,
    ) {
    }
}
