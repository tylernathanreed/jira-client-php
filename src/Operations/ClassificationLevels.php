<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait ClassificationLevels
{
    /**
     * Returns all classification levels
     * 
     * **"Permissions" required:** None.
     * 
     * @param ?list<'PUBLISHED'|'ARCHIVED'|'DRAFT'> $status Optional set of statuses to filter by.
     * @param 'rank'|'-rank'|'+rank'|null $orderBy Ordering of the results by a given field. If not provided, values will not be sorted.
     */
    public function getAllUserDataClassificationLevels(
        ?array $status = null,
        ?string $orderBy = null,
    ): Schema\DataClassificationLevelsBean {
        return $this->call(
            uri: '/rest/api/3/classification-levels',
            method: 'get',
            query: compact('status', 'orderBy'),
            success: 200,
            schema: Schema\DataClassificationLevelsBean::class,
        );
    }
}
