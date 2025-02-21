<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// VersionApproverDoc
final readonly class VersionApprover extends Dto
{
    public function __construct(
        /** The Atlassian account ID of the approver. */
        public ?string $accountId = null,

        /** A description of why the user is declining the approval. */
        public ?string $declineReason = null,

        /** A description of what the user is approving within the specified version. */
        public ?string $description = null,

        /** The status of the approval, which can be *PENDING*, *APPROVED*, or *DECLINED* */
        public ?string $status = null,
    ) {
    }
}
