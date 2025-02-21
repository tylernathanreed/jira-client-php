<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WebhookDetailsDoc
final readonly class WebhookDetails extends Dto
{
    public function __construct(
        /**
         * The Jira events that trigger the webhook.
         * 
         * @var list<string>
         */
        public array $events,

        /**
         * The JQL filter that specifies which issues the webhook is sent for.
         * Only a subset of JQL can be used.
         * The supported elements are:
         * 
         *  - Fields: `issueKey`, `project`, `issuetype`, `status`, `assignee`, `reporter`, `issue.property`, and `cf[id]`.
         * For custom fields (`cf[id]`), only the epic label custom field is supported."
         *  - Operators: `=`, `!=`, `IN`, and `NOT IN`.
         */
        public string $jqlFilter,

        /**
         * A list of field IDs.
         * When the issue changelog contains any of the fields, the webhook `jira:issue_updated` is sent.
         * If this parameter is not present, the app is notified about all field updates.
         * 
         * @var ?list<string>
         */
        public ?array $fieldIdsFilter = null,

        /**
         * A list of issue property keys.
         * A change of those issue properties triggers the `issue_property_set` or `issue_property_deleted` webhooks.
         * If this parameter is not present, the app is notified about all issue property updates.
         * 
         * @var ?list<string>
         */
        public ?array $issuePropertyKeysFilter = null,
    ) {
    }
}
