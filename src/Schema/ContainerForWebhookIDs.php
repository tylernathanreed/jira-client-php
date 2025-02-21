<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ContainerForWebhookIDsDoc
final readonly class ContainerForWebhookIDs extends Dto
{
    public function __construct(
        /**
         * A list of webhook IDs.
         * 
         * @var list<int>
         */
        public array $webhookIds,
    ) {
    }
}
