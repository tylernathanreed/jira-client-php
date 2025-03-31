# User

A user with details as permitted by the user's Atlassian Account privacy settings.
However, be aware of these exceptions:

 - User record deleted from Atlassian: This occurs as the result of a right to be forgotten request.
In this case, `displayName` provides an indication and other parameters have default values or are blank (for example, email is blank)
 - User record corrupted: This occurs as a results of events such as a server import and can only happen to deleted users.
In this case, `accountId` returns *unknown* and all other parameters have fallback values
 - User record unavailable: This usually occurs due to an internal service outage.
In this case, all parameters have fallback values.

Source: [`Jira\Client\Schema\User`](/src/Schema/User.php)

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. Required in requests. |
| `accountType` | `'atlassian'\|'app'\|'customer'\|'unknown'\|null` | The user account type. Can take the following values:<br/><br/> *  `atlassian` regular Atlassian user account<br/> *  `app` system account used for Connect applications and OAuth to represent external systems<br/> *  `customer` Jira Service Desk account representing an external service desk |
| `active` | `bool` | Whether the user is active. |
| `applicationRoles` | [`SimpleListWrapperApplicationRole`](/docs/schema/simple-list-wrapper-application-role.md) | The application roles the user is assigned to. |
| `avatarUrls` | [`AvatarUrlsBean`](/docs/schema/avatar-urls-bean.md) | The avatars of the user. |
| `displayName` | `string` | The display name of the user. Depending on the user’s privacy setting, this may return an alternative value. |
| `emailAddress` | `string` | The email address of the user. Depending on the user’s privacy setting, this may be returned as null. |
| `expand` | `string` | Expand options that include additional user details in the response. |
| `groups` | [`SimpleListWrapperGroupName`](/docs/schema/simple-list-wrapper-group-name.md) | The groups that the user belongs to. |
| `key` | `string` | This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `locale` | `string` | The locale of the user. Depending on the user’s privacy setting, this may be returned as null. |
| `name` | `string` | This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `self` | `string` | The URL of the user. |
| `timeZone` | `string` | The time zone specified in the user's profile. If the user's time zone is not visible to the current user (due to user's profile setting), or if a time zone has not been set, the instance's default time zone will be returned. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Issues](/docs/operations/issues.md) | [assignIssue](/docs/operations/issues.md#assign-issue) |
| [Myself](/docs/operations/myself.md) | [getCurrentUser](/docs/operations/myself.md#get-current-user) |
| [Users](/docs/operations/users.md) | [getUser](/docs/operations/users.md#get-user) |
| [Users](/docs/operations/users.md) | [createUser](/docs/operations/users.md#create-user) |
| [Users](/docs/operations/users.md) | [getAllUsersDefault](/docs/operations/users.md#get-all-users-default) |
| [Users](/docs/operations/users.md) | [getAllUsers](/docs/operations/users.md#get-all-users) |
| [UserSearch](/docs/operations/user-search.md) | [findBulkAssignableUsers](/docs/operations/user-search.md#find-bulk-assignable-users) |
| [UserSearch](/docs/operations/user-search.md) | [findAssignableUsers](/docs/operations/user-search.md#find-assignable-users) |
| [UserSearch](/docs/operations/user-search.md) | [findUsersWithAllPermissions](/docs/operations/user-search.md#find-users-with-all-permissions) |
| [UserSearch](/docs/operations/user-search.md) | [findUsers](/docs/operations/user-search.md#find-users) |
| [UserSearch](/docs/operations/user-search.md) | [findUsersWithBrowsePermission](/docs/operations/user-search.md#find-users-with-browse-permission) |

### Schema

| Schema |
| --- |
| [AttachmentMetadata](/docs/schema/attachment-metadata.md) |
| [BulkOperationProgress](/docs/schema/bulk-operation-progress.md) |
| [ComponentWithIssueCount](/docs/schema/component-with-issue-count.md) |
| [Filter](/docs/schema/filter.md) |
| [FilterDetails](/docs/schema/filter-details.md) |
| [FilterSubscription](/docs/schema/filter-subscription.md) |
| [PageBeanUser](/docs/schema/page-bean-user.md) |
| [Project](/docs/schema/project.md) |
| [ProjectComponent](/docs/schema/project-component.md) |
| [UserList](/docs/schema/user-list.md) |
| [Votes](/docs/schema/votes.md) |
| [WorkflowScheme](/docs/schema/workflow-scheme.md) |
