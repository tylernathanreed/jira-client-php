<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of webhooks to register. */
final readonly class WebhookRegistrationDetails extends Dto
{
    public function __construct(
        /**
         * The URL that specifies where to send the webhooks.
         * This URL must use the same base URL as the Connect app.
         * Only a single URL per app is allowed to be registered.
         */
        public string $url,

        /**
         * A list of webhooks.
         * 
         * @var list<WebhookDetails>
         */
        public array $webhooks,
    ) {
    }
}
