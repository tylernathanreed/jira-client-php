<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * A reference to the location of the error.
 * This will be null if the error does not refer to a specific element.
 */
final readonly class WorkflowElementReference extends Dto
{
    public function __construct(
        /** A property key. */
        public ?string $propertyKey = null,

        /** A rule ID. */
        public ?string $ruleId = null,

        public ?ProjectAndIssueTypePair $statusMappingReference = null,

        /** A status reference. */
        public ?string $statusReference = null,

        /** A transition ID. */
        public ?string $transitionId = null,
    ) {
    }
}
