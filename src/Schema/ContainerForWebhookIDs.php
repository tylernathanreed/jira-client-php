<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Container for a list of webhook IDs. */
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
