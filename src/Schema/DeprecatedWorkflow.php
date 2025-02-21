<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// DeprecatedWorkflowDoc
final readonly class DeprecatedWorkflow extends Dto
{
    public function __construct(
        public ?bool $default = null,

        /** The description of the workflow. */
        public ?string $description = null,

        /** The datetime the workflow was last modified. */
        public ?string $lastModifiedDate = null,

        /**
         * This property is no longer available and will be removed from the documentation soon.
         * See the "deprecation notice" for details.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/
         */
        public ?string $lastModifiedUser = null,

        /** The account ID of the user that last modified the workflow. */
        public ?string $lastModifiedUserAccountId = null,

        /** The name of the workflow. */
        public ?string $name = null,

        /** The scope where this workflow applies */
        public ?Scope $scope = null,

        /** The number of steps included in the workflow. */
        public ?int $steps = null,
    ) {
    }
}
