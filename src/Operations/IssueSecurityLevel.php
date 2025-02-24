<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueSecurityLevel
{
    /**
     * Returns issue security level members
     * 
     * Only issue security level members in context of classic projects are returned
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $issueSecuritySchemeId The ID of the issue security scheme.
     *                                   Use the "Get issue security schemes" operation to get a list of issue security scheme IDs.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param ?list<string> $issueSecurityLevelId The list of issue security level IDs.
     *                                            To include multiple issue security levels separate IDs with ampersand: `issueSecurityLevelId=10000&issueSecurityLevelId=10001`.
     * @param string $expand Use expand to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `all` Returns all expandable information
     *                        - `field` Returns information about the custom field granted the permission
     *                        - `group` Returns information about the group that is granted the permission
     *                        - `projectRole` Returns information about the project role granted the permission
     *                        - `user` Returns information about the user who is granted the permission.
     */
    public function getIssueSecurityLevelMembers(
        int $issueSecuritySchemeId,
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?array $issueSecurityLevelId = null,
        ?string $expand = null,
    ): Schema\PageBeanIssueSecurityLevelMember {
        return $this->call(
            uri: '/rest/api/3/issuesecurityschemes/{issueSecuritySchemeId}/members',
            method: 'get',
            query: compact('startAt', 'maxResults', 'issueSecurityLevelId', 'expand'),
            path: compact('issueSecuritySchemeId'),
            success: 200,
            schema: Schema\PageBeanIssueSecurityLevelMember::class,
        );
    }

    /**
     * Returns details of an issue security level
     * 
     * Use "Get issue security scheme" to obtain the IDs of issue security levels associated with the issue security scheme
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None.
     * 
     * @param string $id The ID of the issue security level.
     */
    public function getIssueSecurityLevel(
        string $id,
    ): Schema\SecurityLevel {
        return $this->call(
            uri: '/rest/api/3/securitylevel/{id}',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: Schema\SecurityLevel::class,
        );
    }
}
