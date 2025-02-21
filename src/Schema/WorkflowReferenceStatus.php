<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The statuses referenced in the workflow. */
final readonly class WorkflowReferenceStatus extends Dto
{
    public function __construct(
        public ?ApprovalConfiguration $approvalConfiguration = null,

        /** Indicates if the status is deprecated. */
        public ?bool $deprecated = null,

        public ?WorkflowStatusLayout $layout = null,

        /**
         * The properties associated with the status.
         * 
         * @var array<string,string>
         */
        public ?array $properties = null,

        /** The reference of the status. */
        public ?string $statusReference = null,
    ) {
    }
}
