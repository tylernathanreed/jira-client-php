<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A page of failed webhooks. */
final readonly class FailedWebhooks extends Dto
{
    public function __construct(
        /**
         * The maximum number of items on the page.
         * If the list of values is shorter than this number, then there are no more pages.
         */
        public int $maxResults,

        /**
         * The list of webhooks.
         * 
         * @var list<FailedWebhook>
         */
        public array $values,

        /**
         * The URL to the next page of results.
         * Present only if the request returned at least one result.The next page may be empty at the time of receiving the response, but new failed webhooks may appear in time.
         * You can save the URL to the next page and query for new results periodically (for example, every hour).
         */
        public ?string $next = null,
    ) {
    }
}
