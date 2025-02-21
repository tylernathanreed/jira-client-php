<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** ID of a registered webhook or error messages explaining why a webhook wasn't registered. */
final readonly class RegisteredWebhook extends Dto
{
    public function __construct(
        /**
         * The ID of the webhook.
         * Returned if the webhook is created.
         */
        public ?int $createdWebhookId = null,

        /**
         * Error messages specifying why the webhook creation failed.
         * 
         * @var ?list<string>
         */
        public ?array $errors = null,
    ) {
    }
}
