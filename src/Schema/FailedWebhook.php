<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about a failed webhook. */
final readonly class FailedWebhook extends Dto
{
    public function __construct(
        /** The time the webhook was added to the list of failed webhooks (that is, the time of the last failed retry). */
        public int $failureTime,

        /** The webhook ID, as sent in the `X-Atlassian-Webhook-Identifier` header with the webhook. */
        public string $id,

        /** The original webhook destination. */
        public string $url,

        /** The webhook body. */
        public ?string $body = null,
    ) {
    }
}
