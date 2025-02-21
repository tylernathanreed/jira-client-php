<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * Container for a list of registered webhooks.
 * Webhook details are returned in the same order as the request.
 */
final readonly class ContainerForRegisteredWebhooks extends Dto
{
    public function __construct(
        /**
         * A list of registered webhooks.
         * 
         * @var ?list<RegisteredWebhook>
         */
        public ?array $webhookRegistrationResult = null,
    ) {
    }
}
