<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait GroupAndUserPicker
{
    /**
     * Returns a list of users and groups matching a string.
     * The string is used:
     * 
     *  - for users, to find a case-insensitive match with display name and e-mail address.
     * Note that if a user has hidden their email address in their user profile, partial matches of the email address will not find the user.
     * An exact match is required
     *  - for groups, to find a case-sensitive match with group name
     * 
     * For example, if the string *tin* is used, records with the display name *Tina*, email address *sarah@tinplatetraining.com*, and the group *accounting* would be returned
     * 
     * Optionally, the search can be refined to:
     * 
     *  - the projects and issue types associated with a custom field, such as a user picker.
     * The search can then be further refined to return only users and groups that have permission to view specific:
     *     
     *      - projects
     *      - issue types
     *     
     *     If multiple projects or issue types are specified, they must be a subset of those enabled for the custom field or no results are returned.
     * For example, if a field is enabled for projects A, B, and C then the search could be limited to projects B and C.
     * However, if the search is limited to projects B and D, nothing is returned
     *  - not return Connect app users and groups
     *  - return groups that have a case-insensitive match with the query
     * 
     * The primary use case for this resource is to populate a picker field suggestion list with users or groups.
     * To this end, the returned object includes an `html` field for each list.
     * This field highlights the matched query term in the item name with the HTML strong tag.
     * Also, each list is wrapped in a response object that contains a header for use in a picker, specifically *Showing X of Y matching groups*
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse users and groups* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $query The search string.
     * @param int $maxResults The maximum number of items to return in each list.
     * @param bool $showAvatar Whether the user avatar should be returned.
     *                         If an invalid value is provided, the default value is used.
     * @param string $fieldId The custom field ID of the field this request is for.
     * @param ?list<string> $projectId The ID of a project that returned users and groups must have permission to view.
     *                                 To include multiple projects, provide an ampersand-separated list.
     *                                 For example, `projectId=10000&projectId=10001`.
     *                                 This parameter is only used when `fieldId` is present.
     * @param ?list<string> $issueTypeId The ID of an issue type that returned users and groups must have permission to view.
     *                                   To include multiple issue types, provide an ampersand-separated list.
     *                                   For example, `issueTypeId=10000&issueTypeId=10001`.
     *                                   Special values, such as `-1` (all standard issue types) and `-2` (all subtask issue types), are supported.
     *                                   This parameter is only used when `fieldId` is present.
     * @param 'xsmall'|'xsmall@2x'|'xsmall@3x'|'small'|'small@2x'|'small@3x'|'medium'|'medium@2x'|'medium@3x'|'large'|'large@2x'|'large@3x'|'xlarge'|'xlarge@2x'|'xlarge@3x'|'xxlarge'|'xxlarge@2x'|'xxlarge@3x'|'xxxlarge'|'xxxlarge@2x'|'xxxlarge@3x'|null $avatarSize
     *        The size of the avatar to return.
     *        If an invalid value is provided, the default value is used.
     * @param bool $caseInsensitive Whether the search for groups should be case insensitive.
     * @param bool $excludeConnectAddons Whether Connect app users and groups should be excluded from the search results.
     *                                   If an invalid value is provided, the default value is used.
     */
    public function findUsersAndGroups(
        string $query,
        ?int $maxResults = 50,
        ?bool $showAvatar = false,
        ?string $fieldId = null,
        ?array $projectId = null,
        ?array $issueTypeId = null,
        ?string $avatarSize = 'xsmall',
        ?bool $caseInsensitive = false,
        ?bool $excludeConnectAddons = false,
    ): Schema\FoundUsersAndGroups {
        return $this->call(
            uri: '/rest/api/3/groupuserpicker',
            method: 'get',
            query: compact('query', 'maxResults', 'showAvatar', 'fieldId', 'projectId', 'issueTypeId', 'avatarSize', 'caseInsensitive', 'excludeConnectAddons'),
            success: 200,
            schema: Schema\FoundUsersAndGroups::class,
        );
    }
}
