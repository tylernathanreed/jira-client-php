# Projects

Source: [`Jira\Client\Operations\Projects`](/src/Operations/Projects.php)

## Operations

- [Get All Projects](#getAllProjects)
- [Create Project](#createProject)
- [Get Recent Projects](#getRecent)
- [Get Projects Paginated](#searchProjects)
- [Get Project](#getProject)
- [Update Project](#updateProject)
- [Delete Project](#deleteProject)
- [Archive Project](#archiveProject)
- [Delete Project Asynchronously](#deleteProjectAsynchronously)
- [Restore Deleted Or Archived Project](#restore)
- [Get All Statuses For Project](#getAllStatuses)
- [Get Project Issue Type Hierarchy](#getHierarchy)
- [Get Project Notification Scheme](#getNotificationSchemeForProject)

## Get All Projects
<a name="getAllProjects"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-projects/#api-rest-api-3-project-get

Returns all projects visible to the user.
Deprecated, use " Get projects paginated" that supports search and pagination

This operation can be accessed anonymously

**"Permissions" required:** Projects are returned only where the user has *Browse Projects* or *Administer projects* "project permission" for the project.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var array $response */
$response = $client->getAllProjects(
    expand: null,
    recent: null,
    properties: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `?string` | Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expanded options include:<br/><br/> *  `description` Returns the project description.<br/> *  `issueTypes` Returns all issue types associated with the project.<br/> *  `lead` Returns information about the project lead.<br/> *  `projectKeys` Returns all project keys associated with the project. |
| `recent` | `?int` | Returns the user's most recently accessed projects. You may specify the number of results to return up to a maximum of 20. If access is anonymous, then the recently accessed projects are based on the current HTTP session. |
| `properties` | `?list<string>` | A list of project properties to return for the project. This parameter accepts a comma-separated list. |

#### Response


## Create Project
<a name="createProject"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-projects/#api-rest-api-3-project-post

Creates a project based on a project type template, as shown in the following table:

| Project Type Key | Project Template Key |  
|--|--|  
| `business` | `com.atlassian.jira-core-project-templates:jira-core-simplified-content-management`, `com.atlassian.jira-core-project-templates:jira-core-simplified-document-approval`, `com.atlassian.jira-core-project-templates:jira-core-simplified-lead-tracking`, `com.atlassian.jira-core-project-templates:jira-core-simplified-process-control`, `com.atlassian.jira-core-project-templates:jira-core-simplified-procurement`, `com.atlassian.jira-core-project-templates:jira-core-simplified-project-management`, `com.atlassian.jira-core-project-templates:jira-core-simplified-recruitment`, `com.atlassian.jira-core-project-templates:jira-core-simplified-task-tracking` |  
| `service_desk` | `com.atlassian.servicedesk:simplified-it-service-management`, `com.atlassian.servicedesk:simplified-general-service-desk-it`, `com.atlassian.servicedesk:simplified-general-service-desk-business`, `com.atlassian.servicedesk:simplified-external-service-desk`, `com.atlassian.servicedesk:simplified-hr-service-desk`, `com.atlassian.servicedesk:simplified-facilities-service-desk`, `com.atlassian.servicedesk:simplified-legal-service-desk`, `com.atlassian.servicedesk:simplified-analytics-service-desk`, `com.atlassian.servicedesk:simplified-marketing-service-desk`, `com.atlassian.servicedesk:simplified-design-service-desk`, `com.atlassian.servicedesk:simplified-sales-service-desk`, `com.atlassian.servicedesk:simplified-blank-project-business`, `com.atlassian.servicedesk:simplified-blank-project-it`, `com.atlassian.servicedesk:simplified-finance-service-desk`, `com.atlassian.servicedesk:next-gen-it-service-desk`, `com.atlassian.servicedesk:next-gen-hr-service-desk`, `com.atlassian.servicedesk:next-gen-legal-service-desk`, `com.atlassian.servicedesk:next-gen-marketing-service-desk`, `com.atlassian.servicedesk:next-gen-facilities-service-desk`, `com.atlassian.servicedesk:next-gen-general-it-service-desk`, `com.atlassian.servicedesk:next-gen-general-business-service-desk`, `com.atlassian.servicedesk:next-gen-analytics-service-desk`, `com.atlassian.servicedesk:next-gen-finance-service-desk`, `com.atlassian.servicedesk:next-gen-design-service-desk`, `com.atlassian.servicedesk:next-gen-sales-service-desk` |  
| `software` | `com.pyxis.greenhopper.jira:gh-simplified-agility-kanban`, `com.pyxis.greenhopper.jira:gh-simplified-agility-scrum`, `com.pyxis.greenhopper.jira:gh-simplified-basic`, `com.pyxis.greenhopper.jira:gh-simplified-kanban-classic`, `com.pyxis.greenhopper.jira:gh-simplified-scrum-classic` |  
The project types are available according to the installed Jira features as follows:

 - Jira Core, the default, enables `business` projects
 - Jira Service Management enables `service_desk` projects
 - Jira Software enables `software` projects

To determine which features are installed, go to **Jira settings** > **Apps** > **Manage apps** and review the System Apps list.
To add Jira Software or Jira Service Management into a JIRA instance, use **Jira settings** > **Apps** > **Finding new apps**.
For more information, see " Managing add-ons"

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/S31NLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\ProjectIdentifiers $response */
$response = $client->createProject(new Schema\CreateProjectDetails(
    assigneeType: 'PROJECT_LEAD',
    avatarId: '10200',
    categoryId: '10120',
    description: 'Cloud migration initiative',
    issueSecurityScheme: '10001',
    key: 'EX',
    leadAccountId: '5b10a0effa615349cb016cd8',
    name: 'Example',
    notificationScheme: '10021',
    permissionScheme: '10011',
    projectTemplateKey: 'com.atlassian.jira-core-project-templates:jira-core-simplified-process-control',
    projectTypeKey: 'business',
    url: 'http://atlassian.com',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\CreateProjectDetails`](/docs/schema/create-project-details.md)

Details about the project.

| Property | Type | Description |
| --- | --- | --- |
| `key` | `string` | Project keys must be unique and start with an uppercase letter followed by one or more uppercase alphanumeric characters. The maximum length is 10 characters. |
| `name` | `string` | The name of the project. |
| `assigneeType` | `'PROJECT_LEAD'\|'UNASSIGNED'\|null` | The default assignee when creating issues for this project. |
| `avatarId` | `int` | An integer value for the project's avatar. |
| `categoryId` | `int` | The ID of the project's category. A complete list of category IDs is found using the [Get all project categories](#api-rest-api-3-projectCategory-get) operation. |
| `description` | `string` | A brief description of the project. |
| `fieldConfigurationScheme` | `int` | The ID of the field configuration scheme for the project. Use the [Get all field configuration schemes](#api-rest-api-3-fieldconfigurationscheme-get) operation to get a list of field configuration scheme IDs. If you specify the field configuration scheme you cannot specify the project template key. |
| `issueSecurityScheme` | `int` | The ID of the issue security scheme for the project, which enables you to control who can and cannot view issues. Use the [Get issue security schemes](#api-rest-api-3-issuesecurityschemes-get) resource to get all issue security scheme IDs. |
| `issueTypeScheme` | `int` | The ID of the issue type scheme for the project. Use the [Get all issue type schemes](#api-rest-api-3-issuetypescheme-get) operation to get a list of issue type scheme IDs. If you specify the issue type scheme you cannot specify the project template key. |
| `issueTypeScreenScheme` | `int` | The ID of the issue type screen scheme for the project. Use the [Get all issue type screen schemes](#api-rest-api-3-issuetypescreenscheme-get) operation to get a list of issue type screen scheme IDs. If you specify the issue type screen scheme you cannot specify the project template key. |
| `lead` | `string` | This parameter is deprecated because of privacy changes. Use `leadAccountId` instead. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. The user name of the project lead. Either `lead` or `leadAccountId` must be set when creating a project. Cannot be provided with `leadAccountId`. |
| `leadAccountId` | `string` | The account ID of the project lead. Either `lead` or `leadAccountId` must be set when creating a project. Cannot be provided with `lead`. |
| `notificationScheme` | `int` | The ID of the notification scheme for the project. Use the [Get notification schemes](#api-rest-api-3-notificationscheme-get) resource to get a list of notification scheme IDs. |
| `permissionScheme` | `int` | The ID of the permission scheme for the project. Use the [Get all permission schemes](#api-rest-api-3-permissionscheme-get) resource to see a list of all permission scheme IDs. |
| `projectTemplateKey` | `'com.pyxis.greenhopper.jira:gh-simplified-agility-kanban'\|`<br/>`'com.pyxis.greenhopper.jira:gh-simplified-agility-scrum'\|`<br/>`'com.pyxis.greenhopper.jira:gh-simplified-basic'\|`<br/>`'com.pyxis.greenhopper.jira:gh-simplified-kanban-classic'\|`<br/>`'com.pyxis.greenhopper.jira:gh-simplified-scrum-classic'\|`<br/>`'com.pyxis.greenhopper.jira:gh-cross-team-template'\|`<br/>`'com.pyxis.greenhopper.jira:gh-cross-team-planning-template'\|`<br/>`'com.atlassian.servicedesk:simplified-it-service-management'\|`<br/>`'com.atlassian.servicedesk:simplified-it-service-management-basic'\|`<br/>`'com.atlassian.servicedesk:simplified-it-service-management-operations'\|`<br/>`'com.atlassian.servicedesk:simplified-general-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-general-service-desk-it'\|`<br/>`'com.atlassian.servicedesk:simplified-general-service-desk-business'\|`<br/>`'com.atlassian.servicedesk:simplified-internal-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-external-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-hr-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-facilities-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-legal-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-marketing-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-finance-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-analytics-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-design-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-sales-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-halp-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-blank-project-it'\|`<br/>`'com.atlassian.servicedesk:simplified-blank-project-business'\|`<br/>`'com.atlassian.servicedesk:next-gen-it-service-desk'\|`<br/>`'com.atlassian.servicedesk:next-gen-hr-service-desk'\|`<br/>`'com.atlassian.servicedesk:next-gen-legal-service-desk'\|`<br/>`'com.atlassian.servicedesk:next-gen-marketing-service-desk'\|`<br/>`'com.atlassian.servicedesk:next-gen-facilities-service-desk'\|`<br/>`'com.atlassian.servicedesk:next-gen-general-service-desk'\|`<br/>`'com.atlassian.servicedesk:next-gen-general-it-service-desk'\|`<br/>`'com.atlassian.servicedesk:next-gen-general-business-service-desk'\|`<br/>`'com.atlassian.servicedesk:next-gen-analytics-service-desk'\|`<br/>`'com.atlassian.servicedesk:next-gen-finance-service-desk'\|`<br/>`'com.atlassian.servicedesk:next-gen-design-service-desk'\|`<br/>`'com.atlassian.servicedesk:next-gen-sales-service-desk'\|`<br/>`'com.atlassian.jira-core-project-templates:jira-core-simplified-content-management'\|`<br/>`'com.atlassian.jira-core-project-templates:jira-core-simplified-document-approval'\|`<br/>`'com.atlassian.jira-core-project-templates:jira-core-simplified-lead-tracking'\|`<br/>`'com.atlassian.jira-core-project-templates:jira-core-simplified-process-control'\|`<br/>`'com.atlassian.jira-core-project-templates:jira-core-simplified-procurement'\|`<br/>`'com.atlassian.jira-core-project-templates:jira-core-simplified-project-management'\|`<br/>`'com.atlassian.jira-core-project-templates:jira-core-simplified-recruitment'\|`<br/>`'com.atlassian.jira-core-project-templates:jira-core-simplified-task-'\|`<br/>`null` | A predefined configuration for a project. The type of the `projectTemplateKey` must match with the type of the `projectTypeKey`. |
| `projectTypeKey` | `'software'\|`<br/>`'service_desk'\|`<br/>`'business'\|`<br/>`null` | The [project type](https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes), which defines the application-specific feature set. If you don't specify the project template you have to specify the project type. |
| `url` | `string` | A link to information about this project, such as project documentation |
| `workflowScheme` | `int` | The ID of the workflow scheme for the project. Use the [Get all workflow schemes](#api-rest-api-3-workflowscheme-get) operation to get a list of workflow scheme IDs. If you specify the workflow scheme you cannot specify the project template key. |

#### Response

Source: [`Jira\Client\Schema\ProjectIdentifiers`](/docs/schema/project-identifiers.md)

Identifiers for a project.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the created project. |
| `key` | `string` | The key of the created project. |
| `self` | `string` | The URL of the created project. |


## Get Recent Projects
<a name="getRecent"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-projects/#api-rest-api-3-project-recent-get

Returns a list of up to 20 projects recently viewed by the user that are still visible to the user

This operation can be accessed anonymously

**"Permissions" required:** Projects are returned only where the user has one of:

 - *Browse Projects* "project permission" for the project
 - *Administer Projects* "project permission" for the project
 - *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var array $response */
$response = $client->getRecent(
    expand: null,
    properties: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `?string` | Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expanded options include:<br/><br/> *  `description` Returns the project description.<br/> *  `projectKeys` Returns all project keys associated with a project.<br/> *  `lead` Returns information about the project lead.<br/> *  `issueTypes` Returns all issue types associated with the project.<br/> *  `url` Returns the URL associated with the project.<br/> *  `permissions` Returns the permissions associated with the project.<br/> *  `insight` EXPERIMENTAL. Returns the insight details of total issue count and last issue update time for the project.<br/> *  `*` Returns the project with all available expand options. |
| `properties` | [`?list<Schema\StringList>`](/docs/schema/schema\-string-list.md) | EXPERIMENTAL. A list of project properties to return for the project. This parameter accepts a comma-separated list. Invalid property names are ignored. |

#### Response


## Get Projects Paginated
<a name="searchProjects"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-projects/#api-rest-api-3-project-search-get

Returns a "paginated" list of projects visible to the user

This operation can be accessed anonymously

**"Permissions" required:** Projects are returned only where the user has one of:

 - *Browse Projects* "project permission" for the project
 - *Administer Projects* "project permission" for the project
 - *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanProject $response */
$response = $client->searchProjects(
    startAt: 0,
    maxResults: 50,
    orderBy: 'key',
    id: null,
    keys: null,
    query: null,
    typeKey: null,
    categoryId: null,
    action: 'view',
    expand: null,
    status: null,
    properties: null,
    propertyQuery: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `orderBy` | `'category'\|`<br/>`'-category'\|`<br/>`'+category'\|`<br/>`'key'\|`<br/>`'-key'\|`<br/>`'+key'\|`<br/>`'name'\|`<br/>`'-name'\|`<br/>`'+name'\|`<br/>`'owner'\|`<br/>`'-owner'\|`<br/>`'+owner'\|`<br/>`'issueCount'\|`<br/>`'-issueCount'\|`<br/>`'+issueCount'\|`<br/>`'lastIssueUpdatedDate'\|`<br/>`'-lastIssueUpdatedDate'\|`<br/>`'+lastIssueUpdatedDate'\|`<br/>`'archivedDate'\|`<br/>`'+archivedDate'\|`<br/>`'-archivedDate'\|`<br/>`'deletedDate'\|`<br/>`'+deletedDate'\|`<br/>`'-deletedDate'\|`<br/>`null` | [Order](#ordering) the results by a field.<br/><br/> *  `category` Sorts by project category. A complete list of category IDs is found using [Get all project categories](#api-rest-api-3-projectCategory-get).<br/> *  `issueCount` Sorts by the total number of issues in each project.<br/> *  `key` Sorts by project key.<br/> *  `lastIssueUpdatedTime` Sorts by the last issue update time.<br/> *  `name` Sorts by project name.<br/> *  `owner` Sorts by project lead.<br/> *  `archivedDate` EXPERIMENTAL. Sorts by project archived date.<br/> *  `deletedDate` EXPERIMENTAL. Sorts by project deleted date. |
| `id` | `?list<int>` | The project IDs to filter the results by. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`. Up to 50 project IDs can be provided. |
| `keys` | `?list<string>` | The project keys to filter the results by. To include multiple keys, provide an ampersand-separated list. For example, `keys=PA&keys=PB`. Up to 50 project keys can be provided. |
| `query` | `?string` | Filter the results using a literal string. Projects with a matching `key` or `name` are returned (case insensitive). |
| `typeKey` | `?string` | Orders results by the [project type](https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes). This parameter accepts a comma-separated list. Valid values are `business`, `service_desk`, and `software`. |
| `categoryId` | `?int` | The ID of the project's category. A complete list of category IDs is found using the [Get all project categories](#api-rest-api-3-projectCategory-get) operation. |
| `action` | `'view'\|'browse'\|'edit'\|'create'\|null` | Filter results by projects for which the user can:<br/><br/> *  `view` the project, meaning that they have one of the following permissions:<br/>    <br/>     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.<br/>     *  *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.<br/>     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).<br/> *  `browse` the project, meaning that they have the *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.<br/> *  `edit` the project, meaning that they have one of the following permissions:<br/>    <br/>     *  *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.<br/>     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).<br/> *  `create` the project, meaning that they have the *Create issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project in which the issue is created. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expanded options include:<br/><br/> *  `description` Returns the project description.<br/> *  `projectKeys` Returns all project keys associated with a project.<br/> *  `lead` Returns information about the project lead.<br/> *  `issueTypes` Returns all issue types associated with the project.<br/> *  `url` Returns the URL associated with the project.<br/> *  `insight` EXPERIMENTAL. Returns the insight details of total issue count and last issue update time for the project. |
| `status` | `?list<'live'\|'archived'\|'deleted'>` | EXPERIMENTAL. Filter results by project status:<br/><br/> *  `live` Search live projects.<br/> *  `archived` Search archived projects.<br/> *  `deleted` Search deleted projects, those in the recycle bin. |
| `properties` | [`?list<Schema\StringList>`](/docs/schema/schema\-string-list.md) | EXPERIMENTAL. A list of project properties to return for the project. This parameter accepts a comma-separated list. |
| `propertyQuery` | `?string` | EXPERIMENTAL. A query string used to search properties. The query string cannot be specified using a JSON object. For example, to search for the value of `nested` from `{"something":{"nested":1,"other":2}}` use `[thepropertykey].something.nested=1`. Note that the propertyQuery key is enclosed in square brackets to enable searching where the propertyQuery key includes dot (.) or equals (=) characters. Note that `thepropertykey` is only returned when included in `properties`. |

#### Response

Source: [`Jira\Client\Schema\PageBeanProject`](/docs/schema/page-bean-project.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<Project>`](/docs/schema/project.md) | The list of items. |


## Get Project
<a name="getProject"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-projects/#api-rest-api-3-project-project-id-or-key-get

Returns the "project details" for a project

This operation can be accessed anonymously

**"Permissions" required:** *Browse projects* "project permission" for the project.
See: https://confluence.atlassian.com/x/ahLpNw
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\Project $response */
$response = $client->getProject(
    projectIdOrKey: 'foo',
    expand: null,
    properties: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case sensitive). |
| `expand` | `?string` | Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Note that the project description, issue types, and project lead are included in all responses by default. Expand options include:<br/><br/> *  `description` The project description.<br/> *  `issueTypes` The issue types associated with the project.<br/> *  `lead` The project lead.<br/> *  `projectKeys` All project keys associated with the project.<br/> *  `issueTypeHierarchy` The project issue type hierarchy. |
| `properties` | `?list<string>` | A list of project properties to return for the project. This parameter accepts a comma-separated list. |

#### Response

Source: [`Jira\Client\Schema\Project`](/docs/schema/project.md)

Details about a project.

| Property | Type | Description |
| --- | --- | --- |
| `archived` | `bool` | Whether the project is archived. |
| `archivedBy` | [`User`](/docs/schema/user.md) | The user who archived the project. |
| `archivedDate` | `string` | The date when the project was archived. |
| `assigneeType` | `'PROJECT_LEAD'\|'UNASSIGNED'\|null` | The default assignee when creating issues for this project. |
| `avatarUrls` | [`AvatarUrlsBean`](/docs/schema/avatar-urls-bean.md) | The URLs of the project's avatars. |
| `components` | [`?list<ProjectComponent>`](/docs/schema/project-component.md) | List of the components contained in the project. |
| `deleted` | `bool` | Whether the project is marked as deleted. |
| `deletedBy` | [`User`](/docs/schema/user.md) | The user who marked the project as deleted. |
| `deletedDate` | `string` | The date when the project was marked as deleted. |
| `description` | `string` | A brief description of the project. |
| `email` | `string` | An email address associated with the project. |
| `expand` | `string` | Expand options that include additional project details in the response. |
| `favourite` | `bool` | Whether the project is selected as a favorite. |
| `id` | `string` | The ID of the project. |
| `insight` | [`ProjectInsight`](/docs/schema/project-insight.md) | Insights about the project. |
| `isPrivate` | `bool` | Whether the project is private from the user's perspective. This means the user can't see the project or any associated issues. |
| `issueTypeHierarchy` | [`Hierarchy`](/docs/schema/hierarchy.md) | The issue type hierarchy for the project. |
| `issueTypes` | [`?list<IssueTypeDetails>`](/docs/schema/issue-type-details.md) | List of the issue types available in the project. |
| `key` | `string` | The key of the project. |
| `landingPageInfo` | [`ProjectLandingPageInfo`](/docs/schema/project-landing-page-info.md) | The project landing page info. |
| `lead` | [`User`](/docs/schema/user.md) | The username of the project lead. |
| `name` | `string` | The name of the project. |
| `permissions` | [`ProjectPermissions`](/docs/schema/project-permissions.md) | User permissions on the project |
| `projectCategory` | [`ProjectCategory`](/docs/schema/project-category.md) | The category the project belongs to. |
| `projectTypeKey` | `'software'\|`<br/>`'service_desk'\|`<br/>`'business'\|`<br/>`null` | The [project type](https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes) of the project. |
| `properties` | `array<string,mixed>` | Map of project properties |
| `retentionTillDate` | `string` | The date when the project is deleted permanently. |
| `roles` | `array<string,string>` | The name and self URL for each role defined in the project. For more information, see [Create project role](#api-rest-api-3-role-post). |
| `self` | `string` | The URL of the project details. |
| `simplified` | `bool` | Whether the project is simplified. |
| `style` | `'classic'\|'next-gen'\|null` | The type of the project. |
| `url` | `string` | A link to information about this project, such as project documentation. |
| `uuid` | `string` | Unique ID for next-gen projects. |
| `versions` | [`?list<Version>`](/docs/schema/version.md) | The versions defined in the project. For more information, see [Create version](#api-rest-api-3-version-post). |


## Update Project
<a name="updateProject"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-projects/#api-rest-api-3-project-project-id-or-key-put

Updates the "project details" of a project

All parameters are optional in the body of the request.
Schemes will only be updated if they are included in the request, any omitted schemes will be left unchanged

**"Permissions" required:** *Administer Jira* "global permission".
is only needed when changing the schemes or project key.
Otherwise you will only need *Administer Projects* "project permission"
See: https://confluence.atlassian.com/x/ahLpNw
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\Project $response */
$response = $client->updateProject(
    request: new Schema\UpdateProjectDetails(
        assigneeType: 'PROJECT_LEAD',
        avatarId: '10200',
        categoryId: '10120',
        description: 'Cloud migration initiative',
        issueSecurityScheme: '10001',
        key: 'EX',
        leadAccountId: '5b10a0effa615349cb016cd8',
        name: 'Example',
        notificationScheme: '10021',
        permissionScheme: '10011',
        url: 'http://atlassian.com',
    )
    projectIdOrKey: 10001,
    expand: null,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\UpdateProjectDetails`](/docs/schema/update-project-details.md)

Details about the project.

| Property | Type | Description |
| --- | --- | --- |
| `assigneeType` | `'PROJECT_LEAD'\|'UNASSIGNED'\|null` | The default assignee when creating issues for this project. |
| `avatarId` | `int` | An integer value for the project's avatar. |
| `categoryId` | `int` | The ID of the project's category. A complete list of category IDs is found using the [Get all project categories](#api-rest-api-3-projectCategory-get) operation. To remove the project category from the project, set the value to `-1.` |
| `description` | `string` | A brief description of the project. |
| `issueSecurityScheme` | `int` | The ID of the issue security scheme for the project, which enables you to control who can and cannot view issues. Use the [Get issue security schemes](#api-rest-api-3-issuesecurityschemes-get) resource to get all issue security scheme IDs. |
| `key` | `string` | Project keys must be unique and start with an uppercase letter followed by one or more uppercase alphanumeric characters. The maximum length is 10 characters. |
| `lead` | `string` | This parameter is deprecated because of privacy changes. Use `leadAccountId` instead. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. The user name of the project lead. Cannot be provided with `leadAccountId`. |
| `leadAccountId` | `string` | The account ID of the project lead. Cannot be provided with `lead`. |
| `name` | `string` | The name of the project. |
| `notificationScheme` | `int` | The ID of the notification scheme for the project. Use the [Get notification schemes](#api-rest-api-3-notificationscheme-get) resource to get a list of notification scheme IDs. |
| `permissionScheme` | `int` | The ID of the permission scheme for the project. Use the [Get all permission schemes](#api-rest-api-3-permissionscheme-get) resource to see a list of all permission scheme IDs. |
| `releasedProjectKeys` | `?list<string>` | Previous project keys to be released from the current project. Released keys must belong to the current project and not contain the current project key |
| `url` | `string` | A link to information about this project, such as project documentation |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case sensitive). |
| `expand` | `?string` | Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Note that the project description, issue types, and project lead are included in all responses by default. Expand options include:<br/><br/> *  `description` The project description.<br/> *  `issueTypes` The issue types associated with the project.<br/> *  `lead` The project lead.<br/> *  `projectKeys` All project keys associated with the project. |

#### Response

Source: [`Jira\Client\Schema\Project`](/docs/schema/project.md)

Details about a project.

| Property | Type | Description |
| --- | --- | --- |
| `archived` | `bool` | Whether the project is archived. |
| `archivedBy` | [`User`](/docs/schema/user.md) | The user who archived the project. |
| `archivedDate` | `string` | The date when the project was archived. |
| `assigneeType` | `'PROJECT_LEAD'\|'UNASSIGNED'\|null` | The default assignee when creating issues for this project. |
| `avatarUrls` | [`AvatarUrlsBean`](/docs/schema/avatar-urls-bean.md) | The URLs of the project's avatars. |
| `components` | [`?list<ProjectComponent>`](/docs/schema/project-component.md) | List of the components contained in the project. |
| `deleted` | `bool` | Whether the project is marked as deleted. |
| `deletedBy` | [`User`](/docs/schema/user.md) | The user who marked the project as deleted. |
| `deletedDate` | `string` | The date when the project was marked as deleted. |
| `description` | `string` | A brief description of the project. |
| `email` | `string` | An email address associated with the project. |
| `expand` | `string` | Expand options that include additional project details in the response. |
| `favourite` | `bool` | Whether the project is selected as a favorite. |
| `id` | `string` | The ID of the project. |
| `insight` | [`ProjectInsight`](/docs/schema/project-insight.md) | Insights about the project. |
| `isPrivate` | `bool` | Whether the project is private from the user's perspective. This means the user can't see the project or any associated issues. |
| `issueTypeHierarchy` | [`Hierarchy`](/docs/schema/hierarchy.md) | The issue type hierarchy for the project. |
| `issueTypes` | [`?list<IssueTypeDetails>`](/docs/schema/issue-type-details.md) | List of the issue types available in the project. |
| `key` | `string` | The key of the project. |
| `landingPageInfo` | [`ProjectLandingPageInfo`](/docs/schema/project-landing-page-info.md) | The project landing page info. |
| `lead` | [`User`](/docs/schema/user.md) | The username of the project lead. |
| `name` | `string` | The name of the project. |
| `permissions` | [`ProjectPermissions`](/docs/schema/project-permissions.md) | User permissions on the project |
| `projectCategory` | [`ProjectCategory`](/docs/schema/project-category.md) | The category the project belongs to. |
| `projectTypeKey` | `'software'\|`<br/>`'service_desk'\|`<br/>`'business'\|`<br/>`null` | The [project type](https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes) of the project. |
| `properties` | `array<string,mixed>` | Map of project properties |
| `retentionTillDate` | `string` | The date when the project is deleted permanently. |
| `roles` | `array<string,string>` | The name and self URL for each role defined in the project. For more information, see [Create project role](#api-rest-api-3-role-post). |
| `self` | `string` | The URL of the project details. |
| `simplified` | `bool` | Whether the project is simplified. |
| `style` | `'classic'\|'next-gen'\|null` | The type of the project. |
| `url` | `string` | A link to information about this project, such as project documentation. |
| `uuid` | `string` | Unique ID for next-gen projects. |
| `versions` | [`?list<Version>`](/docs/schema/version.md) | The versions defined in the project. For more information, see [Create version](#api-rest-api-3-version-post). |


## Delete Project
<a name="deleteProject"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-projects/#api-rest-api-3-project-project-id-or-key-delete

Deletes a project

You can't delete a project if it's archived.
To delete an archived project, restore the project and then delete it.
To restore a project, use the Jira UI

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteProject(
    projectIdOrKey: 10001,
    enableUndo: true,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case sensitive). |
| `enableUndo` | `?bool` | Whether this project is placed in the Jira recycle bin where it will be available for restoration. |

#### Response

`true`
## Archive Project
<a name="archiveProject"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-projects/#api-rest-api-3-project-project-id-or-key-archive-post

Archives a project.
You can't delete a project if it's archived.
To delete an archived project, restore the project and then delete it.
To restore a project, use the Jira UI

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->archiveProject(
    projectIdOrKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case sensitive). |

#### Response

`true`
## Delete Project Asynchronously
<a name="deleteProjectAsynchronously"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-projects/#api-rest-api-3-project-project-id-or-key-delete-post

Deletes a project asynchronously

This operation is:

 - transactional, that is, if part of the delete fails the project is not deleted
 - "asynchronous".
Follow the `location` link in the response to determine the status of the task and use "Get task" to obtain subsequent updates

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case sensitive). |

#### Response

Source: [`Jira\Client\Schema\TaskProgressBeanObject`](/docs/schema/task-progress-bean-object.md)

Details about a task.

| Property | Type | Description |
| --- | --- | --- |
| `elapsedRuntime` | `int` | The execution time of the task, in milliseconds. |
| `id` | `string` | The ID of the task. |
| `lastUpdate` | `int` | A timestamp recording when the task progress was last updated. |
| `progress` | `int` | The progress of the task, as a percentage complete. |
| `self` | `string` | The URL of the task. |
| `status` | `'ENQUEUED'\|`<br/>`'RUNNING'\|`<br/>`'COMPLETE'\|`<br/>`'FAILED'\|`<br/>`'CANCEL_REQUESTED'\|`<br/>`'CANCELLED'\|`<br/>`'DEAD'` | The status of the task. |
| `submitted` | `int` | A timestamp recording when the task was submitted. |
| `submittedBy` | `int` | The ID of the user who submitted the task. |
| `description` | `string` | The description of the task. |
| `finished` | `int` | A timestamp recording when the task was finished. |
| `message` | `string` | Information about the progress of the task. |
| `result` | `mixed` | The result of the task execution. |
| `started` | `int` | A timestamp recording when the task was started. |


## Restore Deleted Or Archived Project
<a name="restore"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-projects/#api-rest-api-3-project-project-id-or-key-restore-post

Restores a project that has been archived or placed in the Jira recycle bin

**"Permissions" required:**

 - *Administer Jira* "global permission"for Company managed projects
 - *Administer Jira* "global permission" or *Administer projects* "project permission" for the project for Team managed projects.
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\Project $response */
$response = $client->restore(
    projectIdOrKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case sensitive). |

#### Response

Source: [`Jira\Client\Schema\Project`](/docs/schema/project.md)

Details about a project.

| Property | Type | Description |
| --- | --- | --- |
| `archived` | `bool` | Whether the project is archived. |
| `archivedBy` | [`User`](/docs/schema/user.md) | The user who archived the project. |
| `archivedDate` | `string` | The date when the project was archived. |
| `assigneeType` | `'PROJECT_LEAD'\|'UNASSIGNED'\|null` | The default assignee when creating issues for this project. |
| `avatarUrls` | [`AvatarUrlsBean`](/docs/schema/avatar-urls-bean.md) | The URLs of the project's avatars. |
| `components` | [`?list<ProjectComponent>`](/docs/schema/project-component.md) | List of the components contained in the project. |
| `deleted` | `bool` | Whether the project is marked as deleted. |
| `deletedBy` | [`User`](/docs/schema/user.md) | The user who marked the project as deleted. |
| `deletedDate` | `string` | The date when the project was marked as deleted. |
| `description` | `string` | A brief description of the project. |
| `email` | `string` | An email address associated with the project. |
| `expand` | `string` | Expand options that include additional project details in the response. |
| `favourite` | `bool` | Whether the project is selected as a favorite. |
| `id` | `string` | The ID of the project. |
| `insight` | [`ProjectInsight`](/docs/schema/project-insight.md) | Insights about the project. |
| `isPrivate` | `bool` | Whether the project is private from the user's perspective. This means the user can't see the project or any associated issues. |
| `issueTypeHierarchy` | [`Hierarchy`](/docs/schema/hierarchy.md) | The issue type hierarchy for the project. |
| `issueTypes` | [`?list<IssueTypeDetails>`](/docs/schema/issue-type-details.md) | List of the issue types available in the project. |
| `key` | `string` | The key of the project. |
| `landingPageInfo` | [`ProjectLandingPageInfo`](/docs/schema/project-landing-page-info.md) | The project landing page info. |
| `lead` | [`User`](/docs/schema/user.md) | The username of the project lead. |
| `name` | `string` | The name of the project. |
| `permissions` | [`ProjectPermissions`](/docs/schema/project-permissions.md) | User permissions on the project |
| `projectCategory` | [`ProjectCategory`](/docs/schema/project-category.md) | The category the project belongs to. |
| `projectTypeKey` | `'software'\|`<br/>`'service_desk'\|`<br/>`'business'\|`<br/>`null` | The [project type](https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes) of the project. |
| `properties` | `array<string,mixed>` | Map of project properties |
| `retentionTillDate` | `string` | The date when the project is deleted permanently. |
| `roles` | `array<string,string>` | The name and self URL for each role defined in the project. For more information, see [Create project role](#api-rest-api-3-role-post). |
| `self` | `string` | The URL of the project details. |
| `simplified` | `bool` | Whether the project is simplified. |
| `style` | `'classic'\|'next-gen'\|null` | The type of the project. |
| `url` | `string` | A link to information about this project, such as project documentation. |
| `uuid` | `string` | Unique ID for next-gen projects. |
| `versions` | [`?list<Version>`](/docs/schema/version.md) | The versions defined in the project. For more information, see [Create version](#api-rest-api-3-version-post). |


## Get All Statuses For Project
<a name="getAllStatuses"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-projects/#api-rest-api-3-project-project-id-or-key-statuses-get

Returns the valid statuses for a project.
The statuses are grouped by issue type, as each project has a set of valid issue types and each issue type has a set of valid statuses

This operation can be accessed anonymously

**"Permissions" required:** *Browse Projects* "project permission" for the project.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var array $response */
$response = $client->getAllStatuses(
    projectIdOrKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case sensitive). |

#### Response


## Get Project Issue Type Hierarchy
<a name="getHierarchy"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-projects/#api-rest-api-3-project-project-id-hierarchy-get

Get the issue type hierarchy for a next-gen project

The issue type hierarchy for a project consists of:

 - *Epic* at level 1 (optional)
 - One or more issue types at level 0 such as *Story*, *Task*, or *Bug*.
Where the issue type *Epic* is defined, these issue types are used to break down the content of an epic
 - *Subtask* at level -1 (optional).
This issue type enables level 0 issue types to be broken down into components.
Issues based on a level -1 issue type must have a parent issue

**"Permissions" required:** *Browse projects* "project permission" for the project.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\ProjectIssueTypeHierarchy $response */
$response = $client->getHierarchy(
    projectId: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectId` | `int` | The ID of the project. |

#### Response

Source: [`Jira\Client\Schema\ProjectIssueTypeHierarchy`](/docs/schema/project-issue-type-hierarchy.md)

The hierarchy of issue types within a project.

| Property | Type | Description |
| --- | --- | --- |
| `hierarchy` | [`?list<ProjectIssueTypesHierarchyLevel>`](/docs/schema/project-issue-types-hierarchy-level.md) | Details of an issue type hierarchy level. |
| `projectId` | `int` | The ID of the project. |


## Get Project Notification Scheme
<a name="getNotificationSchemeForProject"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-projects/#api-rest-api-3-project-project-key-or-id-notificationscheme-get

Gets a "notification scheme" associated with the project

**"Permissions" required:** *Administer Jira* "global permission" or *Administer Projects* "project permission".
See: https://confluence.atlassian.com/x/8YdKLg
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\NotificationScheme $response */
$response = $client->getNotificationSchemeForProject(
    projectKeyOrId: 'foo',
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectKeyOrId` | `string` | The project ID or project key (case sensitive). |
| `expand` | `?string` | Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `all` Returns all expandable information<br/> *  `field` Returns information about any custom fields assigned to receive an event<br/> *  `group` Returns information about any groups assigned to receive an event<br/> *  `notificationSchemeEvents` Returns a list of event associations. This list is returned for all expandable information<br/> *  `projectRole` Returns information about any project roles assigned to receive an event<br/> *  `user` Returns information about any users assigned to receive an event |

#### Response

Source: [`Jira\Client\Schema\NotificationScheme`](/docs/schema/notification-scheme.md)

Details about a notification scheme.

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the notification scheme. |
| `expand` | `string` | Expand options that include additional notification scheme details in the response. |
| `id` | `int` | The ID of the notification scheme. |
| `name` | `string` | The name of the notification scheme. |
| `notificationSchemeEvents` | [`?list<NotificationSchemeEvent>`](/docs/schema/notification-scheme-event.md) | The notification events and associated recipients. |
| `projects` | `?list<int>` | The list of project IDs associated with the notification scheme. |
| `scope` | [`Scope`](/docs/schema/scope.md) | The scope of the notification scheme. |
| `self` | `string` |  |
