<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowMetadataRestModelDoc
final readonly class WorkflowMetadataRestModel extends Dto
{
    public function __construct(
        /** The description of the workflow. */
        public string $description,

        /** The ID of the workflow. */
        public string $id,

        /** The name of the workflow. */
        public string $name,

        /**
         * Deprecated.
         * See the "deprecation notice" for details
         * 
         * Use the optional `workflows.usages` expand to get additional information about the projects and issue types associated with the workflows in the workflow scheme.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298
         * 
         * @var list<SimpleUsage>
         */
        public array $usage,

        public DocumentVersion $version,
    ) {
    }
}
