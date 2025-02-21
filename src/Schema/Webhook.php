<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A webhook. */
final readonly class Webhook extends Dto
{
    public function __construct(
        /**
         * The Jira events that trigger the webhook.
         * 
         * @var list<string>
         */
        public array $events,

        /** The ID of the webhook. */
        public int $id,

        /** The JQL filter that specifies which issues the webhook is sent for. */
        public string $jqlFilter,

        /**
         * The date after which the webhook is no longer sent.
         * Use "Extend webhook life" to extend the date.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-webhooks/#api-rest-api-3-webhook-refresh-put
         */
        public ?int $expirationDate = null,

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
