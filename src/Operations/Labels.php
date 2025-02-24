<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait Labels
{
    /**
     * Returns a "paginated" list of labels.
     * 
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function getAllLabels(
        ?int $startAt = 0,
        ?int $maxResults = 1000,
    ): Schema\PageBeanString {
        return $this->call(
            uri: '/rest/api/3/label',
            method: 'get',
            query: compact('startAt', 'maxResults'),
            success: 200,
            schema: Schema\PageBeanString::class,
        );
    }
}
