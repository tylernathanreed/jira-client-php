<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ContainerForRegisteredWebhooksDoc
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
