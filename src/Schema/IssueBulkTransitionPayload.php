<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueBulkTransitionPayloadDoc
final readonly class IssueBulkTransitionPayload extends Dto
{
    public function __construct(
        /**
         * List of objects and each object has two properties:
         * 
         *  - Issues that will be bulk transitioned
         *  - TransitionId that corresponds to a specific transition of issues that share the same workflow.
         * 
         * @var list<BulkTransitionSubmitInput>
         */
        public array $bulkTransitionInputs,

        /**
         * A boolean value that indicates whether to send a bulk change notification when the issues are being transitioned
         * 
         * If `true`, dispatches a bulk notification email to users about the updates.
         */
        public ?bool $sendBulkNotification = 1,
    ) {
    }
}
