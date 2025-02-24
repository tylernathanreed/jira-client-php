<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait AuditRecords
{
    /**
     * Returns a list of audit records.
     * The list can be filtered to include items:
     * 
     *  - where each item in `filter` has at least one match in any of these fields:
     *     
     *      - `summary`
     *      - `category`
     *      - `eventSource`
     *      - `objectItem.name` If the object is a user, account ID is available to filter
     *      - `objectItem.parentName`
     *      - `objectItem.typeName`
     *      - `changedValues.changedFrom`
     *      - `changedValues.changedTo`
     *      - `remoteAddress`
     *     
     *     For example, if `filter` contains *man ed*, an audit record containing `summary": "User added to group"` and `"category": "group management"` is returned
     *  - created on or after a date and time
     *  - created or or before a date and time
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $offset The number of records to skip before returning the first result.
     * @param int $limit The maximum number of results to return.
     * @param string $filter The strings to match with audit field content, space separated.
     * @param string $from The date and time on or after which returned audit records must have been created.
     *                     If `to` is provided `from` must be before `to` or no audit records are returned.
     * @param string $to The date and time on or before which returned audit results must have been created.
     *                   If `from` is provided `to` must be after `from` or no audit records are returned.
     */
    public function getAuditRecords(
        ?int $offset = 0,
        ?int $limit = 1000,
        ?string $filter = null,
        ?string $from = null,
        ?string $to = null,
    ): Schema\AuditRecords {
        return $this->call(
            uri: '/rest/api/3/auditing/record',
            method: 'get',
            query: compact('offset', 'limit', 'filter', 'from', 'to'),
            success: 200,
            schema: Schema\AuditRecords::class,
        );
    }
}
