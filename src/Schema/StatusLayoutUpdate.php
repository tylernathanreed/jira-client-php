<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// StatusLayoutUpdateDoc
final readonly class StatusLayoutUpdate extends Dto
{
    public function __construct(
        /**
         * The properties for this status layout.
         * 
         * @var array<string,string>
         */
        public array $properties,

        /** A unique ID which the status will use to refer to this layout configuration. */
        public string $statusReference,

        public ?ApprovalConfiguration $approvalConfiguration = null,

        public ?WorkflowLayout $layout = null,
    ) {
    }
}
