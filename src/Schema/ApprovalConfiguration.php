<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ApprovalConfigurationDoc
final readonly class ApprovalConfiguration extends Dto
{
    public function __construct(
        /**
         * Whether the approval configuration is active.
         * 
         * @var 'true'|'false'
         */
        public string $active,

        /**
         * How the required approval count is calculated.
         * It may be configured to require a specific number of approvals, or approval by a percentage of approvers.
         * If the approvers source field is Approver groups, you can configure how many approvals per group are required for the request to be approved.
         * The number will be the same across all groups.
         * 
         * @var 'number'|'percent'|'numberPerPrincipal'
         */
        public string $conditionType,

        /**
         * The number or percentage of approvals required for a request to be approved.
         * If `conditionType` is `number`, the value must be 20 or less.
         * If `conditionType` is `percent`, the value must be 100 or less.
         */
        public string $conditionValue,

        /** The custom field ID of the "Approvers" or "Approver Groups" field. */
        public string $fieldId,

        /** The numeric ID of the transition to be executed if the request is approved. */
        public string $transitionApproved,

        /** The numeric ID of the transition to be executed if the request is declined. */
        public string $transitionRejected,

        /**
         * A list of roles that should be excluded as possible approvers.
         * 
         * @var ?list<string>
         */
        public ?array $exclude = null,

        /**
         * The custom field ID of the field used to pre-populate the Approver field.
         * Only supports the "Affected Services" field.
         */
        public ?string $prePopulatedFieldId = null,
    ) {
    }
}
