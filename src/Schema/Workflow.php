<?php

namespace Jira\Client\Schema;

use DateTimeImmutable;
use Jira\Client\Dto;

// WorkflowDoc
final readonly class Workflow extends Dto
{
    public function __construct(
        /** The description of the workflow. */
        public string $description,

        public PublishedWorkflowId $id,

        /** The creation date of the workflow. */
        public ?DateTimeImmutable $created = null,

        /** Whether the workflow has a draft version. */
        public ?bool $hasDraftWorkflow = null,

        /** Whether this is the default workflow. */
        public ?bool $isDefault = null,

        public ?WorkflowOperations $operations = null,

        /**
         * The projects the workflow is assigned to, through workflow schemes.
         * 
         * @var ?list<ProjectDetails>
         */
        public ?array $projects = null,

        /**
         * The workflow schemes the workflow is assigned to.
         * 
         * @var ?list<WorkflowSchemeIdName>
         */
        public ?array $schemes = null,

        /**
         * The statuses of the workflow.
         * 
         * @var ?list<WorkflowStatus>
         */
        public ?array $statuses = null,

        /**
         * The transitions of the workflow.
         * 
         * @var ?list<Transition>
         */
        public ?array $transitions = null,

        /** The last edited date of the workflow. */
        public ?DateTimeImmutable $updated = null,
    ) {
    }
}
