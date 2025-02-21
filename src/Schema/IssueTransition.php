<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of an issue transition. */
final readonly class IssueTransition extends Dto
{
    public function __construct(
        /** Expand options that include additional transition details in the response. */
        public ?string $expand = null,

        /**
         * Details of the fields associated with the issue transition screen.
         * Use this information to populate `fields` and `update` in a transition request.
         */
        public ?FieldMetadata $fields = null,

        /** Whether there is a screen associated with the issue transition. */
        public ?bool $hasScreen = null,

        /**
         * The ID of the issue transition.
         * Required when specifying a transition to undertake.
         */
        public ?string $id = null,

        /** Whether the transition is available to be performed. */
        public ?bool $isAvailable = null,

        /** Whether the issue has to meet criteria before the issue transition is applied. */
        public ?bool $isConditional = null,

        /** Whether the issue transition is global, that is, the transition is applied to issues regardless of their status. */
        public ?bool $isGlobal = null,

        /** Whether this is the initial issue transition for the workflow. */
        public ?bool $isInitial = null,

        public ?bool $looped = null,

        /** The name of the issue transition. */
        public ?string $name = null,

        /** Details of the issue status after the transition. */
        public ?StatusDetails $to = null,
    ) {
    }
}
