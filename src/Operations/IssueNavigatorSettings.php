<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueNavigatorSettings
{
    /**
     * Returns the default issue navigator columns
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @return list<Schema\ColumnItem>
     */
    public function getIssueNavigatorDefaultColumns(): array
    {
        return $this->call(
            uri: '/rest/api/3/settings/columns',
            method: 'get',
            success: 200,
            schema: [Schema\ColumnItem::class],
        );
    }

    /**
     * Sets the default issue navigator columns
     * 
     * The `columns` parameter accepts a navigable field value and is expressed as HTML form data.
     * To specify multiple columns, pass multiple `columns` parameters.
     * For example, in curl:
     * 
     * `curl -X PUT -d columns=summary -d columns=description https://your-domain.atlassian.net/rest/api/3/settings/columns`
     * 
     * If no column details are sent, then all default columns are removed
     * 
     * A navigable field is one that can be used as a column on the issue navigator.
     * Find details of navigable issue columns using "Get fields"
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function setIssueNavigatorDefaultColumns(): true
    {
        return $this->call(
            uri: '/rest/api/3/settings/columns',
            method: 'put',
            success: 200,
            schema: true,
        );
    }
}
