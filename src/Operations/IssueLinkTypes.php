<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueLinkTypes
{
    /**
     * Returns a list of all issue link types
     * 
     * To use this operation, the site must have "issue linking" enabled
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse projects* "project permission" for a project in the site.
     * 
     * @link https://confluence.atlassian.com/x/yoXKM
     * @link https://confluence.atlassian.com/x/yodKLg
     */
    public function getIssueLinkTypes(): Schema\IssueLinkTypes
    {
        return $this->call(
            uri: '/rest/api/3/issueLinkType',
            method: 'get',
            success: 200,
            schema: Schema\IssueLinkTypes::class,
        );
    }

    /**
     * Creates an issue link type.
     * Use this operation to create descriptions of the reasons why issues are linked.
     * The issue link type consists of a name and descriptions for a link's inward and outward relationships
     * 
     * To use this operation, the site must have "issue linking" enabled
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/yoXKM
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function createIssueLinkType(
        Schema\IssueLinkType $request,
    ): Schema\IssueLinkType {
        return $this->call(
            uri: '/rest/api/3/issueLinkType',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\IssueLinkType::class,
        );
    }

    /**
     * Returns an issue link type
     * 
     * To use this operation, the site must have "issue linking" enabled
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse projects* "project permission" for a project in the site.
     * 
     * @link https://confluence.atlassian.com/x/yoXKM
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $issueLinkTypeId The ID of the issue link type.
     */
    public function getIssueLinkType(
        string $issueLinkTypeId,
    ): Schema\IssueLinkType {
        return $this->call(
            uri: '/rest/api/3/issueLinkType/{issueLinkTypeId}',
            method: 'get',
            path: compact('issueLinkTypeId'),
            success: 200,
            schema: Schema\IssueLinkType::class,
        );
    }

    /**
     * Updates an issue link type
     * 
     * To use this operation, the site must have "issue linking" enabled
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/yoXKM
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $issueLinkTypeId The ID of the issue link type.
     */
    public function updateIssueLinkType(
        Schema\IssueLinkType $request,
        string $issueLinkTypeId,
    ): Schema\IssueLinkType {
        return $this->call(
            uri: '/rest/api/3/issueLinkType/{issueLinkTypeId}',
            method: 'put',
            body: $request,
            path: compact('issueLinkTypeId'),
            success: 200,
            schema: Schema\IssueLinkType::class,
        );
    }

    /**
     * Deletes an issue link type
     * 
     * To use this operation, the site must have "issue linking" enabled
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/yoXKM
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $issueLinkTypeId The ID of the issue link type.
     */
    public function deleteIssueLinkType(
        string $issueLinkTypeId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issueLinkType/{issueLinkTypeId}',
            method: 'delete',
            path: compact('issueLinkTypeId'),
            success: 204,
            schema: true,
        );
    }
}
