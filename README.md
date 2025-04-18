<p align="center">
<img src="/img/logo.png" alt="Logo Jira Cloud REST API Client">
</p>

<p align="center">
<a href="https://www.php.net/"><img src="https://img.shields.io/badge/PHP-8.1+-blue" alt="PHP"></a>
<a href="https://github.com/tylernathanreed/jira-client-php/actions/workflows/tests.yml"><img src="https://github.com/tylernathanreed/jira-client-php/actions/workflows/tests.yml/badge.svg" alt="Tests"></a>
<a href="https://github.com/tylernathanreed/jira-client-php/actions/workflows/coding-standards.yml"><img src="https://github.com/tylernathanreed/jira-client-php/actions/workflows/coding-standards.yml/badge.svg" alt="Lint"></a>
<a href="https://github.com/tylernathanreed/jira-client-php/actions/workflows/static-analysis.yml"><img src="https://github.com/tylernathanreed/jira-client-php/actions/workflows/static-analysis.yml/badge.svg" alt="Static Analysis"></a>
<a href="https://coveralls.io/github/tylernathanreed/jira-client-php?branch=master"><img src="https://coveralls.io/repos/github/tylernathanreed/jira-client-php/badge.svg?branch=master" alt="Code Coverage"></a>
</p>

This package provides an HTTP Client to interact with the [Jira Cloud REST API](https://developer.atlassian.com/cloud/jira/platform/rest).

## Table of Contents

- [Introduction](#introduction)
  - [1. Jira Cloud vs Jira Software Cloud](#jira-cloud-vs-jira-software-cloud)
- [Installation](#installation)
  - [1. Requirements](#requirements)
- [Configuration](#configuration)
  - [1. Authentication](#authentication)
  - [2. Laravel](#laravel)
- [Usage](#usage)
  - [1. Operations](#operations)
  - [2. Schema](#schema)

## Introduction

This package makes working with the [Jira Cloud REST API](https://developer.atlassian.com/cloud/jira/platform/rest) simple and reliable, by providing a lightweight, well-tested PHP client generated from the official OpenAPI spec and designed for a seamless developer experience.

There are other solutions that offer a client for the Jira Cloud REST API, but I found them to be incomplete or lacking of a strong testing foundation. This client is generated from the official [OpenAPI Specification of the Jira Cloud REST API](https://dac-static.atlassian.com/cloud/jira/platform/swagger-v3.v3.json), which means that all operations are supported. Additionally, the code generator is custom built to include tests to ensure that the examples provided by the OpenAPI specification actually work.

### 1. Jira Cloud vs Jira Software Cloud
<a name="jira-cloud-vs-jira-software-cloud"></a>

The [Jira Cloud REST API](https://developer.atlassian.com/cloud/jira/platform/rest) and [Jira Software Cloud REST API](https://developer.atlassian.com/cloud/jira/software/rest) are closely related, but they serve different scopes within the Atlassian ecosystem.

#### i. Jira Cloud REST API

The [Jira Cloud REST API](https://developer.atlassian.com/cloud/jira/platform/rest/v3/intro/#version) acts as the core API, allowing you to interact with **fundamental Jira features** that are available in **all** Jira Cloud products.

Examples of key features and use cases include:
- Creating, editing, deleting issues
- Managing users, groups, and permissions
- Browsing projects
- Working with custom fields, workflows, and screens
- Querying issues with JQL (Jira Query Language)
- Automating ticket creation or updates
- Building dashboards
- Managing users or project settings

#### ii. Jira Software Cloud REST API

The [Jira Software Cloud REST API](https://developer.atlassian.com/cloud/jira/software/rest) acts as an extension to the core API, allowing you to interact with **Jira Software-specificfeatures** that are only available if Jira Software is installed and enabled.

Examples of key features and use cases include:
- Agile and Scrum tools (boards, sprints, backlogs)
- Working with epics, versions, and estimation
- Managing board configurations
- Sprint reports and velocity charts
- Creating or modifying sprints
- Querying sprint or board data for reporting
- Automatically moving issues across boards

This package does not yet support the Jira Software Cloud REST API, and recommends [lesstif/jira-cloud-restapi](https://github.com/lesstif/php-JiraCloud-RESTAPI) if you need these specific features. Note that `lesstif/jira-cloud-restapi` does not support the Jira Cloud REST API (only the Jira Software Cloud REST API), but you may use both that package and this one without conflicts.

## Installation
<a name="installation"></a>

Install this package using [Composer](https://getcomposer.org/):

```bash
composer require jira/client
```

### 1. Requirements
<a name="requirements"></a>

| Version | PHP       | Guzzle            |
| ------- | --------- | ----------------- |
| 1.x     | 8.3 - 8.4 |               7.x |
| 2.x     | 8.1 - 8.4 | None or 6.x - 7.x |

When [Guzzle](https://github.com/guzzle/guzzle) is not installed, [cURL](https://www.php.net/manual/en/ref.curl.php) is used instead.

## Configuration
<a name="configuration"></a>

The Jira Client must be constructed with a Configuration instance.

### 1. Authentication
<a name="authentication"></a>

#### i. Basic Authentication

```php
use Jira\Client\Client;
use Jira\Client\Configuration;

$client = new Client(new Configuration(
    host: 'https://your-domain.atlassian.net',
    username: 'jira-username',
    password: 'jira-password',
));
```

> [!IMPORTANT]
> Basic Authentication using cookie-based authentication (e.g. your website password) was disabled by Atlassian on June 3rd, 2019, in accordance with their [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-basic-auth-and-cookie-based-auth/). Basic Authentication is still fully supported, but the password must be an [API Token](https://support.atlassian.com/atlassian-account/docs/manage-api-tokens-for-your-atlassian-account/). As of December 13th, 2025, API Tokens are set to expire in one year. You will need to rotate your API Tokens prior to expiration.

> [!TIP]
> Atlassian recommends only using [Basic Auth for REST APIs](https://developer.atlassian.com/cloud/jira/platform/basic-auth-for-rest-apis/) for simple scripts, bots, and ad-hoc execution of the REST APIs. The expectation is that you will configure a single "admin/server" user account, and make calls to the API on behalf of this system-configured entity. If you intend to make calls to the API on behalf of an actual user, it is recommended that you use [OAuth 2.0 (3LO) Apps](https://developer.atlassian.com/cloud/jira/platform/oauth-2-3lo-apps/) instead.

#### ii. OAuth 2.0 (3LO) App Authentication

```php
use Jira\Client\Client;
use Jira\Client\Configuration;

$client = new Client(new Configuration(
    host: 'https://your-domain.atlassian.net',
    username: 'jira-username',
    accessToken: 'jira-token',
));
```

> [!TIP]
> Atlassian recommends using [OAuth 2.0 (3LO) Apps](https://developer.atlassian.com/cloud/jira/platform/oauth-2-3lo-apps/) for apps created and managed in their [developer console](https://developer.atlassian.com/console/myapps/). The expectation is that you will be making API calls on behalf of an actual user. If you intend to make calls to the API on behalf of a system-configured admin-like entity, it is recommended that you use [Basic Authentication](https://developer.atlassian.com/cloud/jira/platform/basic-auth-for-rest-apis/) instead.

### 2. Laravel
<a name="laravel"></a>

If you are using Laravel, you can bind the `Configuration` instance to the container in your `AppServiceProvider`:

```php
use Illuminate\Support\ServiceProvider;
use Jira\Client\Configuration;

namespace App\Providers;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Configuration::class, function () {
            return new Configuration(
                host: config('services.jira.host'),
                username: config('services.jira.username'),
                password: config('services.jira.password'),
            )
        });
    }
}
```

This example requires that you add entries to your `services` configuration file:

```php
return [
    /* ... */

    'jira' => [
        'host' => env('JIRA_HOST', 'https://your-domain.atlassian.net'),
        'username' => env('JIRA_USERNAME', 'jira-username'),
        'password' => env('JIRA_PASSWORD')
    ],
];
```

## Usage
<a name="usage"></a>

This package strictly follows the [OpenAPI Specification of the Jira Cloud REST API](https://dac-static.atlassian.com/cloud/jira/platform/swagger-v3.v3.json).

The API Specification for [Operations](https://spec.openapis.org/oas/latest.html#operation-object) includes an `operationId`, which determines the name of the methods available on the `Client` instance.

```php
use Jira\Client\Schema;

$response = $client->createProject(new Schema\CreateProjectDetails(
    key: 'EX',
    name: 'Example',
    projectTypeKey: 'business',
    projectTemplateKey: 'com.atlassian.jira-core-project-templates:jira-core-project-management',
    description: 'Example description',
    avatarId: 10130,
    issueSecurityScheme: 1000,
    permissionScheme: 1000,
    notificationScheme: 1000,
    categoryId: 1000,
));

var_dump($response);

// object(ProjectIdentifiers)#1 (3) {
//   ["id"] => int(10042)
//   ["key"] => string(2) "EX"
//   ["self"] => string(43) "http://example.com/rest/api/2/project/10042"
// }
```

By following the OpenAPI specification, this package supports 100% of all operations documented by Atlassian.

### 1. Operations
<a name="operations"></a>

#### Announcement Banner
- [Get Announcement Banner Configuration](/docs/operations/announcement-banner.md#getBanner)
- [Update Announcement Banner Configuration](/docs/operations/announcement-banner.md#setBanner)

#### App Data Policies
- [Get Data Policy For The Workspace](/docs/operations/app-data-policies.md#getPolicy)
- [Get Data Policy For Projects](/docs/operations/app-data-policies.md#getPolicies)

#### App Migration
- [Bulk Update Custom Field Value](/docs/operations/app-migration.md#AppIssueFieldValueUpdateResource.updateIssueFields_put)
- [Bulk Update Entity Properties](/docs/operations/app-migration.md#MigrationResource.updateEntityPropertiesValue_put)
- [Get Workflow Transition Rule Configurations](/docs/operations/app-migration.md#MigrationResource.workflowRuleSearch_post)

#### App Properties
- [Get App Properties](/docs/operations/app-properties.md#AddonPropertiesResource.getAddonProperties_get)
- [Get App Property](/docs/operations/app-properties.md#AddonPropertiesResource.getAddonProperty_get)
- [Set App Property](/docs/operations/app-properties.md#AddonPropertiesResource.putAddonProperty_put)
- [Delete App Property](/docs/operations/app-properties.md#AddonPropertiesResource.deleteAddonProperty_delete)
- [Set App Property( Forge)](/docs/operations/app-properties.md#putForgeAppProperty)
- [Delete App Property( Forge)](/docs/operations/app-properties.md#deleteForgeAppProperty)

#### Application Roles
- [Get All Application Roles](/docs/operations/application-roles.md#getAllApplicationRoles)
- [Get Application Role](/docs/operations/application-roles.md#getApplicationRole)

#### Audit Records
- [Get Audit Records](/docs/operations/audit-records.md#getAuditRecords)

#### Avatars
- [Get System Avatars By Type](/docs/operations/avatars.md#getAllSystemAvatars)
- [Get Avatars](/docs/operations/avatars.md#getAvatars)
- [Load Avatar](/docs/operations/avatars.md#storeAvatar)
- [Delete Avatar](/docs/operations/avatars.md#deleteAvatar)
- [Get Avatar Image By Type](/docs/operations/avatars.md#getAvatarImageByType)
- [Get Avatar Image By ID ](/docs/operations/avatars.md#getAvatarImageByID)
- [Get Avatar Image By Owner](/docs/operations/avatars.md#getAvatarImageByOwner)

#### Classification Levels
- [Get All Classification Levels](/docs/operations/classification-levels.md#getAllUserDataClassificationLevels)

#### Dashboards
- [Get All Dashboards](/docs/operations/dashboards.md#getAllDashboards)
- [Create Dashboard](/docs/operations/dashboards.md#createDashboard)
- [Bulk Edit Dashboards](/docs/operations/dashboards.md#bulkEditDashboards)
- [Get Available Gadgets](/docs/operations/dashboards.md#getAllAvailableDashboardGadgets)
- [Search For Dashboards](/docs/operations/dashboards.md#getDashboardsPaginated)
- [Get Gadgets](/docs/operations/dashboards.md#getAllGadgets)
- [Add Gadget To Dashboard](/docs/operations/dashboards.md#addGadget)
- [Update Gadget On Dashboard](/docs/operations/dashboards.md#updateGadget)
- [Remove Gadget From Dashboard](/docs/operations/dashboards.md#removeGadget)
- [Get Dashboard Item Property Keys](/docs/operations/dashboards.md#getDashboardItemPropertyKeys)
- [Get Dashboard Item Property](/docs/operations/dashboards.md#getDashboardItemProperty)
- [Set Dashboard Item Property](/docs/operations/dashboards.md#setDashboardItemProperty)
- [Delete Dashboard Item Property](/docs/operations/dashboards.md#deleteDashboardItemProperty)
- [Get Dashboard](/docs/operations/dashboards.md#getDashboard)
- [Update Dashboard](/docs/operations/dashboards.md#updateDashboard)
- [Delete Dashboard](/docs/operations/dashboards.md#deleteDashboard)
- [Copy Dashboard](/docs/operations/dashboards.md#copyDashboard)

#### Dynamic Modules
- [Get Modules](/docs/operations/dynamic-modules.md#DynamicModulesResource.getModules_get)
- [Register Modules](/docs/operations/dynamic-modules.md#DynamicModulesResource.registerModules_post)
- [Remove Modules](/docs/operations/dynamic-modules.md#DynamicModulesResource.removeModules_delete)

#### Filter Sharing
- [Get Default Share Scope](/docs/operations/filter-sharing.md#getDefaultShareScope)
- [Set Default Share Scope](/docs/operations/filter-sharing.md#setDefaultShareScope)
- [Get Share Permissions](/docs/operations/filter-sharing.md#getSharePermissions)
- [Add Share Permission](/docs/operations/filter-sharing.md#addSharePermission)
- [Get Share Permission](/docs/operations/filter-sharing.md#getSharePermission)
- [Delete Share Permission](/docs/operations/filter-sharing.md#deleteSharePermission)

#### Filters
- [Create Filter](/docs/operations/filters.md#createFilter)
- [Get Favorite Filters](/docs/operations/filters.md#getFavouriteFilters)
- [Get My Filters](/docs/operations/filters.md#getMyFilters)
- [Search For Filters](/docs/operations/filters.md#getFiltersPaginated)
- [Get Filter](/docs/operations/filters.md#getFilter)
- [Update Filter](/docs/operations/filters.md#updateFilter)
- [Delete Filter](/docs/operations/filters.md#deleteFilter)
- [Get Columns](/docs/operations/filters.md#getColumns)
- [Set Columns](/docs/operations/filters.md#setColumns)
- [Reset Columns](/docs/operations/filters.md#resetColumns)
- [Add Filter As Favorite](/docs/operations/filters.md#setFavouriteForFilter)
- [Remove Filter As Favorite](/docs/operations/filters.md#deleteFavouriteForFilter)
- [Change Filter Owner](/docs/operations/filters.md#changeFilterOwner)

#### Group And User Picker
- [Find Users And Groups](/docs/operations/group-and-user-picker.md#findUsersAndGroups)

#### Groups
- [Get Group](/docs/operations/groups.md#getGroup)
- [Create Group](/docs/operations/groups.md#createGroup)
- [Remove Group](/docs/operations/groups.md#removeGroup)
- [Bulk Get Groups](/docs/operations/groups.md#bulkGetGroups)
- [Get Users From Group](/docs/operations/groups.md#getUsersFromGroup)
- [Add User To Group](/docs/operations/groups.md#addUserToGroup)
- [Remove User From Group](/docs/operations/groups.md#removeUserFromGroup)
- [Find Groups](/docs/operations/groups.md#findGroups)

#### Issue Attachments
- [Get Attachment Content](/docs/operations/issue-attachments.md#getAttachmentContent)
- [Get Jira Attachment Settings](/docs/operations/issue-attachments.md#getAttachmentMeta)
- [Get Attachment Thumbnail](/docs/operations/issue-attachments.md#getAttachmentThumbnail)
- [Get Attachment Metadata](/docs/operations/issue-attachments.md#getAttachment)
- [Delete Attachment](/docs/operations/issue-attachments.md#removeAttachment)
- [Get All Metadata For An Expanded Attachment](/docs/operations/issue-attachments.md#expandAttachmentForHumans)
- [Get Contents Metadata For An Expanded Attachment](/docs/operations/issue-attachments.md#expandAttachmentForMachines)
- [Add Attachment](/docs/operations/issue-attachments.md#addAttachment)

#### Issue Bulk Operations
- [Bulk Delete Issues](/docs/operations/issue-bulk-operations.md#submitBulkDelete)
- [Get Bulk Editable Fields](/docs/operations/issue-bulk-operations.md#getBulkEditableFields)
- [Bulk Edit Issues](/docs/operations/issue-bulk-operations.md#submitBulkEdit)
- [Bulk Move Issues](/docs/operations/issue-bulk-operations.md#submitBulkMove)
- [Get Available Transitions](/docs/operations/issue-bulk-operations.md#getAvailableTransitions)
- [Bulk Transition Issue Statuses](/docs/operations/issue-bulk-operations.md#submitBulkTransition)
- [Bulk Unwatch Issues](/docs/operations/issue-bulk-operations.md#submitBulkUnwatch)
- [Bulk Watch Issues](/docs/operations/issue-bulk-operations.md#submitBulkWatch)
- [Get Bulk Issue Operation Progress](/docs/operations/issue-bulk-operations.md#getBulkOperationProgress)

#### Issue Comment Properties
- [Get Comment Property Keys](/docs/operations/issue-comment-properties.md#getCommentPropertyKeys)
- [Get Comment Property](/docs/operations/issue-comment-properties.md#getCommentProperty)
- [Set Comment Property](/docs/operations/issue-comment-properties.md#setCommentProperty)
- [Delete Comment Property](/docs/operations/issue-comment-properties.md#deleteCommentProperty)

#### Issue Comments
- [Get Comments By I Ds](/docs/operations/issue-comments.md#getCommentsByIds)
- [Get Comments](/docs/operations/issue-comments.md#getComments)
- [Add Comment](/docs/operations/issue-comments.md#addComment)
- [Get Comment](/docs/operations/issue-comments.md#getComment)
- [Update Comment](/docs/operations/issue-comments.md#updateComment)
- [Delete Comment](/docs/operations/issue-comments.md#deleteComment)

#### Issue Custom Field Associations
- [Create Associations](/docs/operations/issue-custom-field-associations.md#createAssociations)
- [Remove Associations](/docs/operations/issue-custom-field-associations.md#removeAssociations)

#### Issue Custom Field Configuration Apps
- [Bulk Get Custom Field Configurations](/docs/operations/issue-custom-field-configuration-apps.md#getCustomFieldsConfigurations)
- [Get Custom Field Configurations](/docs/operations/issue-custom-field-configuration-apps.md#getCustomFieldConfiguration)
- [Update Custom Field Configurations](/docs/operations/issue-custom-field-configuration-apps.md#updateCustomFieldConfiguration)

#### Issue Custom Field Contexts
- [Get Custom Field Contexts](/docs/operations/issue-custom-field-contexts.md#getContextsForField)
- [Create Custom Field Context](/docs/operations/issue-custom-field-contexts.md#createCustomFieldContext)
- [Get Custom Field Contexts Default Values](/docs/operations/issue-custom-field-contexts.md#getDefaultValues)
- [Set Custom Field Contexts Default Values](/docs/operations/issue-custom-field-contexts.md#setDefaultValues)
- [Get Issue Types For Custom Field Context](/docs/operations/issue-custom-field-contexts.md#getIssueTypeMappingsForContexts)
- [Get Custom Field Contexts For Projects And Issue Types](/docs/operations/issue-custom-field-contexts.md#getCustomFieldContextsForProjectsAndIssueTypes)
- [Get Project Mappings For Custom Field Context](/docs/operations/issue-custom-field-contexts.md#getProjectContextMapping)
- [Update Custom Field Context](/docs/operations/issue-custom-field-contexts.md#updateCustomFieldContext)
- [Delete Custom Field Context](/docs/operations/issue-custom-field-contexts.md#deleteCustomFieldContext)
- [Add Issue Types To Context](/docs/operations/issue-custom-field-contexts.md#addIssueTypesToContext)
- [Remove Issue Types From Context](/docs/operations/issue-custom-field-contexts.md#removeIssueTypesFromContext)
- [Assign Custom Field Context To Projects](/docs/operations/issue-custom-field-contexts.md#assignProjectsToCustomFieldContext)
- [Remove Custom Field Context From Projects](/docs/operations/issue-custom-field-contexts.md#removeCustomFieldContextFromProjects)

#### Issue Custom Field Options
- [Get Custom Field Option](/docs/operations/issue-custom-field-options.md#getCustomFieldOption)
- [Get Custom Field Options(Context)](/docs/operations/issue-custom-field-options.md#getOptionsForContext)
- [Update Custom Field Options(Context)](/docs/operations/issue-custom-field-options.md#updateCustomFieldOption)
- [Create Custom Field Options(Context)](/docs/operations/issue-custom-field-options.md#createCustomFieldOption)
- [Reorder Custom Field Options(Context)](/docs/operations/issue-custom-field-options.md#reorderCustomFieldOptions)
- [Delete Custom Field Options(Context)](/docs/operations/issue-custom-field-options.md#deleteCustomFieldOption)
- [Replace Custom Field Options](/docs/operations/issue-custom-field-options.md#replaceCustomFieldOption)

#### Issue Custom Field Options Apps
- [Get All Issue Field Options](/docs/operations/issue-custom-field-options-apps.md#getAllIssueFieldOptions)
- [Create Issue Field Option](/docs/operations/issue-custom-field-options-apps.md#createIssueFieldOption)
- [Get Selectable Issue Field Options](/docs/operations/issue-custom-field-options-apps.md#getSelectableIssueFieldOptions)
- [Get Visible Issue Field Options](/docs/operations/issue-custom-field-options-apps.md#getVisibleIssueFieldOptions)
- [Get Issue Field Option](/docs/operations/issue-custom-field-options-apps.md#getIssueFieldOption)
- [Update Issue Field Option](/docs/operations/issue-custom-field-options-apps.md#updateIssueFieldOption)
- [Delete Issue Field Option](/docs/operations/issue-custom-field-options-apps.md#deleteIssueFieldOption)
- [Replace Issue Field Option](/docs/operations/issue-custom-field-options-apps.md#replaceIssueFieldOption)

#### Issue Custom Field Values Apps
- [Update Custom Fields](/docs/operations/issue-custom-field-values-apps.md#updateMultipleCustomFieldValues)
- [Update Custom Field Value](/docs/operations/issue-custom-field-values-apps.md#updateCustomFieldValue)

#### Issue Field Configurations
- [Get All Field Configurations](/docs/operations/issue-field-configurations.md#getAllFieldConfigurations)
- [Create Field Configuration](/docs/operations/issue-field-configurations.md#createFieldConfiguration)
- [Update Field Configuration](/docs/operations/issue-field-configurations.md#updateFieldConfiguration)
- [Delete Field Configuration](/docs/operations/issue-field-configurations.md#deleteFieldConfiguration)
- [Get Field Configuration Items](/docs/operations/issue-field-configurations.md#getFieldConfigurationItems)
- [Update Field Configuration Items](/docs/operations/issue-field-configurations.md#updateFieldConfigurationItems)
- [Get All Field Configuration Schemes](/docs/operations/issue-field-configurations.md#getAllFieldConfigurationSchemes)
- [Create Field Configuration Scheme](/docs/operations/issue-field-configurations.md#createFieldConfigurationScheme)
- [Get Field Configuration Issue Type Items](/docs/operations/issue-field-configurations.md#getFieldConfigurationSchemeMappings)
- [Get Field Configuration Schemes For Projects](/docs/operations/issue-field-configurations.md#getFieldConfigurationSchemeProjectMapping)
- [Assign Field Configuration Scheme To Project](/docs/operations/issue-field-configurations.md#assignFieldConfigurationSchemeToProject)
- [Update Field Configuration Scheme](/docs/operations/issue-field-configurations.md#updateFieldConfigurationScheme)
- [Delete Field Configuration Scheme](/docs/operations/issue-field-configurations.md#deleteFieldConfigurationScheme)
- [Assign Issue Types To Field Configurations](/docs/operations/issue-field-configurations.md#setFieldConfigurationSchemeMapping)
- [Remove Issue Types From Field Configuration Scheme](/docs/operations/issue-field-configurations.md#removeIssueTypesFromGlobalFieldConfigurationScheme)

#### Issue Fields
- [Get Fields](/docs/operations/issue-fields.md#getFields)
- [Create Custom Field](/docs/operations/issue-fields.md#createCustomField)
- [Get Fields Paginated](/docs/operations/issue-fields.md#getFieldsPaginated)
- [Get Fields In Trash Paginated](/docs/operations/issue-fields.md#getTrashedFieldsPaginated)
- [Update Custom Field](/docs/operations/issue-fields.md#updateCustomField)
- [Get Contexts For A Field](/docs/operations/issue-fields.md#getContextsForFieldDeprecated)
- [Delete Custom Field](/docs/operations/issue-fields.md#deleteCustomField)
- [Restore Custom Field From Trash](/docs/operations/issue-fields.md#restoreCustomField)
- [Move Custom Field To Trash](/docs/operations/issue-fields.md#trashCustomField)

#### Issue Link Types
- [Get Issue Link Types](/docs/operations/issue-link-types.md#getIssueLinkTypes)
- [Create Issue Link Type](/docs/operations/issue-link-types.md#createIssueLinkType)
- [Get Issue Link Type](/docs/operations/issue-link-types.md#getIssueLinkType)
- [Update Issue Link Type](/docs/operations/issue-link-types.md#updateIssueLinkType)
- [Delete Issue Link Type](/docs/operations/issue-link-types.md#deleteIssueLinkType)

#### Issue Links
- [Create Issue Link](/docs/operations/issue-links.md#linkIssues)
- [Get Issue Link](/docs/operations/issue-links.md#getIssueLink)
- [Delete Issue Link](/docs/operations/issue-links.md#deleteIssueLink)

#### Issue Navigator Settings
- [Get Issue Navigator Default Columns](/docs/operations/issue-navigator-settings.md#getIssueNavigatorDefaultColumns)
- [Set Issue Navigator Default Columns](/docs/operations/issue-navigator-settings.md#setIssueNavigatorDefaultColumns)

#### Issue Notification Schemes
- [Get Notification Schemes Paginated](/docs/operations/issue-notification-schemes.md#getNotificationSchemes)
- [Create Notification Scheme](/docs/operations/issue-notification-schemes.md#createNotificationScheme)
- [Get Projects Using Notification Schemes Paginated](/docs/operations/issue-notification-schemes.md#getNotificationSchemeToProjectMappings)
- [Get Notification Scheme](/docs/operations/issue-notification-schemes.md#getNotificationScheme)
- [Update Notification Scheme](/docs/operations/issue-notification-schemes.md#updateNotificationScheme)
- [Add Notifications To Notification Scheme](/docs/operations/issue-notification-schemes.md#addNotifications)
- [Delete Notification Scheme](/docs/operations/issue-notification-schemes.md#deleteNotificationScheme)
- [Remove Notification From Notification Scheme](/docs/operations/issue-notification-schemes.md#removeNotificationFromNotificationScheme)

#### Issue Priorities
- [Get Priorities](/docs/operations/issue-priorities.md#getPriorities)
- [Create Priority](/docs/operations/issue-priorities.md#createPriority)
- [Set Default Priority](/docs/operations/issue-priorities.md#setDefaultPriority)
- [Move Priorities](/docs/operations/issue-priorities.md#movePriorities)
- [Search Priorities](/docs/operations/issue-priorities.md#searchPriorities)
- [Get Priority](/docs/operations/issue-priorities.md#getPriority)
- [Update Priority](/docs/operations/issue-priorities.md#updatePriority)
- [Delete Priority](/docs/operations/issue-priorities.md#deletePriority)

#### Issue Properties
- [Bulk Set Issues Properties By List](/docs/operations/issue-properties.md#bulkSetIssuesPropertiesList)
- [Bulk Set Issue Properties By Issue](/docs/operations/issue-properties.md#bulkSetIssuePropertiesByIssue)
- [Bulk Set Issue Property](/docs/operations/issue-properties.md#bulkSetIssueProperty)
- [Bulk Delete Issue Property](/docs/operations/issue-properties.md#bulkDeleteIssueProperty)
- [Get Issue Property Keys](/docs/operations/issue-properties.md#getIssuePropertyKeys)
- [Get Issue Property](/docs/operations/issue-properties.md#getIssueProperty)
- [Set Issue Property](/docs/operations/issue-properties.md#setIssueProperty)
- [Delete Issue Property](/docs/operations/issue-properties.md#deleteIssueProperty)

#### Issue Remote Links
- [Get Remote Issue Links](/docs/operations/issue-remote-links.md#getRemoteIssueLinks)
- [Create Or Update Remote Issue Link](/docs/operations/issue-remote-links.md#createOrUpdateRemoteIssueLink)
- [Delete Remote Issue Link By Global ID ](/docs/operations/issue-remote-links.md#deleteRemoteIssueLinkByGlobalId)
- [Get Remote Issue Link By ID ](/docs/operations/issue-remote-links.md#getRemoteIssueLinkById)
- [Update Remote Issue Link By ID ](/docs/operations/issue-remote-links.md#updateRemoteIssueLink)
- [Delete Remote Issue Link By ID ](/docs/operations/issue-remote-links.md#deleteRemoteIssueLinkById)

#### Issue Resolutions
- [Get Resolutions](/docs/operations/issue-resolutions.md#getResolutions)
- [Create Resolution](/docs/operations/issue-resolutions.md#createResolution)
- [Set Default Resolution](/docs/operations/issue-resolutions.md#setDefaultResolution)
- [Move Resolutions](/docs/operations/issue-resolutions.md#moveResolutions)
- [Search Resolutions](/docs/operations/issue-resolutions.md#searchResolutions)
- [Get Resolution](/docs/operations/issue-resolutions.md#getResolution)
- [Update Resolution](/docs/operations/issue-resolutions.md#updateResolution)
- [Delete Resolution](/docs/operations/issue-resolutions.md#deleteResolution)

#### Issue Search
- [Get Issue Picker Suggestions](/docs/operations/issue-search.md#getIssuePickerResource)
- [Check Issues Against JQL ](/docs/operations/issue-search.md#matchIssues)
- [Search For Issues Using JQ L( GE T)](/docs/operations/issue-search.md#searchForIssuesUsingJql)
- [Search For Issues Using JQ L( POS T)](/docs/operations/issue-search.md#searchForIssuesUsingJqlPost)
- [Count Issues Using JQL ](/docs/operations/issue-search.md#countIssues)
- [Search Issue I Ds Using JQL ](/docs/operations/issue-search.md#searchForIssuesIds)
- [Search For Issues Using JQL Enhanced Search( GE T)](/docs/operations/issue-search.md#searchAndReconsileIssuesUsingJql)
- [Search For Issues Using JQL Enhanced Search( POS T)](/docs/operations/issue-search.md#searchAndReconsileIssuesUsingJqlPost)

#### Issue Security Level
- [Get Issue Security Level Members By Issue Security Scheme](/docs/operations/issue-security-level.md#getIssueSecurityLevelMembers)
- [Get Issue Security Level](/docs/operations/issue-security-level.md#getIssueSecurityLevel)

#### Issue Security Schemes
- [Get Issue Security Schemes](/docs/operations/issue-security-schemes.md#getIssueSecuritySchemes)
- [Create Issue Security Scheme](/docs/operations/issue-security-schemes.md#createIssueSecurityScheme)
- [Get Issue Security Levels](/docs/operations/issue-security-schemes.md#getSecurityLevels)
- [Set Default Issue Security Levels](/docs/operations/issue-security-schemes.md#setDefaultLevels)
- [Get Issue Security Level Members](/docs/operations/issue-security-schemes.md#getSecurityLevelMembers)
- [Get Projects Using Issue Security Schemes](/docs/operations/issue-security-schemes.md#searchProjectsUsingSecuritySchemes)
- [Associate Security Scheme To Project](/docs/operations/issue-security-schemes.md#associateSchemesToProjects)
- [Search Issue Security Schemes](/docs/operations/issue-security-schemes.md#searchSecuritySchemes)
- [Get Issue Security Scheme](/docs/operations/issue-security-schemes.md#getIssueSecurityScheme)
- [Update Issue Security Scheme](/docs/operations/issue-security-schemes.md#updateIssueSecurityScheme)
- [Delete Issue Security Scheme](/docs/operations/issue-security-schemes.md#deleteSecurityScheme)
- [Add Issue Security Levels](/docs/operations/issue-security-schemes.md#addSecurityLevel)
- [Update Issue Security Level](/docs/operations/issue-security-schemes.md#updateSecurityLevel)
- [Remove Issue Security Level](/docs/operations/issue-security-schemes.md#removeLevel)
- [Add Issue Security Level Members](/docs/operations/issue-security-schemes.md#addSecurityLevelMembers)
- [Remove Member From Issue Security Level](/docs/operations/issue-security-schemes.md#removeMemberFromSecurityLevel)

#### Issue Type Properties
- [Get Issue Type Property Keys](/docs/operations/issue-type-properties.md#getIssueTypePropertyKeys)
- [Get Issue Type Property](/docs/operations/issue-type-properties.md#getIssueTypeProperty)
- [Set Issue Type Property](/docs/operations/issue-type-properties.md#setIssueTypeProperty)
- [Delete Issue Type Property](/docs/operations/issue-type-properties.md#deleteIssueTypeProperty)

#### Issue Type Schemes
- [Get All Issue Type Schemes](/docs/operations/issue-type-schemes.md#getAllIssueTypeSchemes)
- [Create Issue Type Scheme](/docs/operations/issue-type-schemes.md#createIssueTypeScheme)
- [Get Issue Type Scheme Items](/docs/operations/issue-type-schemes.md#getIssueTypeSchemesMapping)
- [Get Issue Type Schemes For Projects](/docs/operations/issue-type-schemes.md#getIssueTypeSchemeForProjects)
- [Assign Issue Type Scheme To Project](/docs/operations/issue-type-schemes.md#assignIssueTypeSchemeToProject)
- [Update Issue Type Scheme](/docs/operations/issue-type-schemes.md#updateIssueTypeScheme)
- [Delete Issue Type Scheme](/docs/operations/issue-type-schemes.md#deleteIssueTypeScheme)
- [Add Issue Types To Issue Type Scheme](/docs/operations/issue-type-schemes.md#addIssueTypesToIssueTypeScheme)
- [Change Order Of Issue Types](/docs/operations/issue-type-schemes.md#reorderIssueTypesInIssueTypeScheme)
- [Remove Issue Type From Issue Type Scheme](/docs/operations/issue-type-schemes.md#removeIssueTypeFromIssueTypeScheme)

#### Issue Type Screen Schemes
- [Get Issue Type Screen Schemes](/docs/operations/issue-type-screen-schemes.md#getIssueTypeScreenSchemes)
- [Create Issue Type Screen Scheme](/docs/operations/issue-type-screen-schemes.md#createIssueTypeScreenScheme)
- [Get Issue Type Screen Scheme Items](/docs/operations/issue-type-screen-schemes.md#getIssueTypeScreenSchemeMappings)
- [Get Issue Type Screen Schemes For Projects](/docs/operations/issue-type-screen-schemes.md#getIssueTypeScreenSchemeProjectAssociations)
- [Assign Issue Type Screen Scheme To Project](/docs/operations/issue-type-screen-schemes.md#assignIssueTypeScreenSchemeToProject)
- [Update Issue Type Screen Scheme](/docs/operations/issue-type-screen-schemes.md#updateIssueTypeScreenScheme)
- [Delete Issue Type Screen Scheme](/docs/operations/issue-type-screen-schemes.md#deleteIssueTypeScreenScheme)
- [Append Mappings To Issue Type Screen Scheme](/docs/operations/issue-type-screen-schemes.md#appendMappingsForIssueTypeScreenScheme)
- [Update Issue Type Screen Scheme Default Screen Scheme](/docs/operations/issue-type-screen-schemes.md#updateDefaultScreenScheme)
- [Remove Mappings From Issue Type Screen Scheme](/docs/operations/issue-type-screen-schemes.md#removeMappingsFromIssueTypeScreenScheme)
- [Get Issue Type Screen Scheme Projects](/docs/operations/issue-type-screen-schemes.md#getProjectsForIssueTypeScreenScheme)

#### Issue Types
- [Get All Issue Types For User](/docs/operations/issue-types.md#getIssueAllTypes)
- [Create Issue Type](/docs/operations/issue-types.md#createIssueType)
- [Get Issue Types For Project](/docs/operations/issue-types.md#getIssueTypesForProject)
- [Get Issue Type](/docs/operations/issue-types.md#getIssueType)
- [Update Issue Type](/docs/operations/issue-types.md#updateIssueType)
- [Delete Issue Type](/docs/operations/issue-types.md#deleteIssueType)
- [Get Alternative Issue Types](/docs/operations/issue-types.md#getAlternativeIssueTypes)
- [Load Issue Type Avatar](/docs/operations/issue-types.md#createIssueTypeAvatar)

#### Issue Votes
- [Get Votes](/docs/operations/issue-votes.md#getVotes)
- [Add Vote](/docs/operations/issue-votes.md#addVote)
- [Delete Vote](/docs/operations/issue-votes.md#removeVote)

#### Issue Watchers
- [Get Is Watching Issue Bulk](/docs/operations/issue-watchers.md#getIsWatchingIssueBulk)
- [Get Issue Watchers](/docs/operations/issue-watchers.md#getIssueWatchers)
- [Add Watcher](/docs/operations/issue-watchers.md#addWatcher)
- [Delete Watcher](/docs/operations/issue-watchers.md#removeWatcher)

#### Issue Worklog Properties
- [Get Worklog Property Keys](/docs/operations/issue-worklog-properties.md#getWorklogPropertyKeys)
- [Get Worklog Property](/docs/operations/issue-worklog-properties.md#getWorklogProperty)
- [Set Worklog Property](/docs/operations/issue-worklog-properties.md#setWorklogProperty)
- [Delete Worklog Property](/docs/operations/issue-worklog-properties.md#deleteWorklogProperty)

#### Issue Worklogs
- [Get Issue Worklogs](/docs/operations/issue-worklogs.md#getIssueWorklog)
- [Add Worklog](/docs/operations/issue-worklogs.md#addWorklog)
- [Bulk Delete Worklogs](/docs/operations/issue-worklogs.md#bulkDeleteWorklogs)
- [Bulk Move Worklogs](/docs/operations/issue-worklogs.md#bulkMoveWorklogs)
- [Get Worklog](/docs/operations/issue-worklogs.md#getWorklog)
- [Update Worklog](/docs/operations/issue-worklogs.md#updateWorklog)
- [Delete Worklog](/docs/operations/issue-worklogs.md#deleteWorklog)
- [Get I Ds Of Deleted Worklogs](/docs/operations/issue-worklogs.md#getIdsOfWorklogsDeletedSince)
- [Get Worklogs](/docs/operations/issue-worklogs.md#getWorklogsForIds)
- [Get I Ds Of Updated Worklogs](/docs/operations/issue-worklogs.md#getIdsOfWorklogsModifiedSince)

#### Issues
- [Bulk Fetch Changelogs](/docs/operations/issues.md#getBulkChangelogs)
- [Get Events](/docs/operations/issues.md#getEvents)
- [Create Issue](/docs/operations/issues.md#createIssue)
- [Archive Issue(S) By Issue I D/Key](/docs/operations/issues.md#archiveIssues)
- [Archive Issue(S) By JQL ](/docs/operations/issues.md#archiveIssuesAsync)
- [Bulk Create Issue](/docs/operations/issues.md#createIssues)
- [Bulk Fetch Issues](/docs/operations/issues.md#bulkFetchIssues)
- [Get Create Issue Metadata](/docs/operations/issues.md#getCreateIssueMeta)
- [Get Create Metadata Issue Types For A Project](/docs/operations/issues.md#getCreateIssueMetaIssueTypes)
- [Get Create Field Metadata For A Project And Issue Type Id](/docs/operations/issues.md#getCreateIssueMetaIssueTypeId)
- [Get Issue Limit Report](/docs/operations/issues.md#getIssueLimitReport)
- [Unarchive Issue(S) By Issue Keys/ ID ](/docs/operations/issues.md#unarchiveIssues)
- [Get Issue](/docs/operations/issues.md#getIssue)
- [Edit Issue](/docs/operations/issues.md#editIssue)
- [Delete Issue](/docs/operations/issues.md#deleteIssue)
- [Assign Issue](/docs/operations/issues.md#assignIssue)
- [Get Changelogs](/docs/operations/issues.md#getChangeLogs)
- [Get Changelogs By I Ds](/docs/operations/issues.md#getChangeLogsByIds)
- [Get Edit Issue Metadata](/docs/operations/issues.md#getEditIssueMeta)
- [Send Notification For Issue](/docs/operations/issues.md#notify)
- [Get Transitions](/docs/operations/issues.md#getTransitions)
- [Transition Issue](/docs/operations/issues.md#doTransition)
- [Export Archived Issue(S)](/docs/operations/issues.md#exportArchivedIssues)

#### JQL 
- [Get Field Reference Data( GE T)](/docs/operations/jql.md#getAutoComplete)
- [Get Field Reference Data( POS T)](/docs/operations/jql.md#getAutoCompletePost)
- [Get Field Auto Complete Suggestions](/docs/operations/jql.md#getFieldAutoCompleteForQueryString)
- [Parse JQL Query](/docs/operations/jql.md#parseJqlQueries)
- [Convert User Identifiers To Account I Ds In JQL Queries](/docs/operations/jql.md#migrateQueries)
- [Sanitize JQL Queries](/docs/operations/jql.md#sanitiseJqlQueries)

#### JQL Functions Apps
- [Get Precomputations(Apps)](/docs/operations/jql-functions-apps.md#getPrecomputations)
- [Update Precomputations(Apps)](/docs/operations/jql-functions-apps.md#updatePrecomputations)
- [Get Precomputations By I D(Apps)](/docs/operations/jql-functions-apps.md#getPrecomputationsByID)

#### Jira Expressions
- [Analyse Jira Expression](/docs/operations/jira-expressions.md#analyseExpression)
- [Evaluate Jira Expression](/docs/operations/jira-expressions.md#evaluateJiraExpression)
- [Evaluate Jira Expression Using Enhanced Search API ](/docs/operations/jira-expressions.md#evaluateJSISJiraExpression)

#### Jira Settings
- [Get Application Property](/docs/operations/jira-settings.md#getApplicationProperty)
- [Get Advanced Settings](/docs/operations/jira-settings.md#getAdvancedSettings)
- [Set Application Property](/docs/operations/jira-settings.md#setApplicationProperty)
- [Get Global Settings](/docs/operations/jira-settings.md#getConfiguration)

#### Labels
- [Get All Labels](/docs/operations/labels.md#getAllLabels)

#### License Metrics
- [Get License](/docs/operations/license-metrics.md#getLicense)
- [Get Approximate License Count](/docs/operations/license-metrics.md#getApproximateLicenseCount)
- [Get Approximate Application License Count](/docs/operations/license-metrics.md#getApproximateApplicationLicenseCount)

#### Myself
- [Get Preference](/docs/operations/myself.md#getPreference)
- [Set Preference](/docs/operations/myself.md#setPreference)
- [Delete Preference](/docs/operations/myself.md#removePreference)
- [Get Locale](/docs/operations/myself.md#getLocale)
- [Set Locale](/docs/operations/myself.md#setLocale)
- [Delete Locale](/docs/operations/myself.md#deleteLocale)
- [Get Current User](/docs/operations/myself.md#getCurrentUser)

#### Permission Schemes
- [Get All Permission Schemes](/docs/operations/permission-schemes.md#getAllPermissionSchemes)
- [Create Permission Scheme](/docs/operations/permission-schemes.md#createPermissionScheme)
- [Get Permission Scheme](/docs/operations/permission-schemes.md#getPermissionScheme)
- [Update Permission Scheme](/docs/operations/permission-schemes.md#updatePermissionScheme)
- [Delete Permission Scheme](/docs/operations/permission-schemes.md#deletePermissionScheme)
- [Get Permission Scheme Grants](/docs/operations/permission-schemes.md#getPermissionSchemeGrants)
- [Create Permission Grant](/docs/operations/permission-schemes.md#createPermissionGrant)
- [Get Permission Scheme Grant](/docs/operations/permission-schemes.md#getPermissionSchemeGrant)
- [Delete Permission Scheme Grant](/docs/operations/permission-schemes.md#deletePermissionSchemeEntity)

#### Permissions
- [Get My Permissions](/docs/operations/permissions.md#getMyPermissions)
- [Get All Permissions](/docs/operations/permissions.md#getAllPermissions)
- [Get Bulk Permissions](/docs/operations/permissions.md#getBulkPermissions)
- [Get Permitted Projects](/docs/operations/permissions.md#getPermittedProjects)

#### Plans
- [Get Plans Paginated](/docs/operations/plans.md#getPlans)
- [Create Plan](/docs/operations/plans.md#createPlan)
- [Get Plan](/docs/operations/plans.md#getPlan)
- [Update Plan](/docs/operations/plans.md#updatePlan)
- [Archive Plan](/docs/operations/plans.md#archivePlan)
- [Duplicate Plan](/docs/operations/plans.md#duplicatePlan)
- [Trash Plan](/docs/operations/plans.md#trashPlan)

#### Priority Schemes
- [Get Priority Schemes](/docs/operations/priority-schemes.md#getPrioritySchemes)
- [Create Priority Scheme](/docs/operations/priority-schemes.md#createPriorityScheme)
- [Suggested Priorities For Mappings](/docs/operations/priority-schemes.md#suggestedPrioritiesForMappings)
- [Get Available Priorities By Priority Scheme](/docs/operations/priority-schemes.md#getAvailablePrioritiesByPriorityScheme)
- [Update Priority Scheme](/docs/operations/priority-schemes.md#updatePriorityScheme)
- [Delete Priority Scheme](/docs/operations/priority-schemes.md#deletePriorityScheme)
- [Get Priorities By Priority Scheme](/docs/operations/priority-schemes.md#getPrioritiesByPriorityScheme)
- [Get Projects By Priority Scheme](/docs/operations/priority-schemes.md#getProjectsByPriorityScheme)

#### Project Avatars
- [Set Project Avatar](/docs/operations/project-avatars.md#updateProjectAvatar)
- [Delete Project Avatar](/docs/operations/project-avatars.md#deleteProjectAvatar)
- [Load Project Avatar](/docs/operations/project-avatars.md#createProjectAvatar)
- [Get All Project Avatars](/docs/operations/project-avatars.md#getAllProjectAvatars)

#### Project Categories
- [Get All Project Categories](/docs/operations/project-categories.md#getAllProjectCategories)
- [Create Project Category](/docs/operations/project-categories.md#createProjectCategory)
- [Get Project Category By ID ](/docs/operations/project-categories.md#getProjectCategoryById)
- [Update Project Category](/docs/operations/project-categories.md#updateProjectCategory)
- [Delete Project Category](/docs/operations/project-categories.md#removeProjectCategory)

#### Project Classification Levels
- [Get The Default Data Classification Level Of A Project](/docs/operations/project-classification-levels.md#getDefaultProjectClassification)
- [Update The Default Data Classification Level Of A Project](/docs/operations/project-classification-levels.md#updateDefaultProjectClassification)
- [Remove The Default Data Classification Level From A Project](/docs/operations/project-classification-levels.md#removeDefaultProjectClassification)

#### Project Components
- [Find Components For Projects](/docs/operations/project-components.md#findComponentsForProjects)
- [Create Component](/docs/operations/project-components.md#createComponent)
- [Get Component](/docs/operations/project-components.md#getComponent)
- [Update Component](/docs/operations/project-components.md#updateComponent)
- [Delete Component](/docs/operations/project-components.md#deleteComponent)
- [Get Component Issues Count](/docs/operations/project-components.md#getComponentRelatedIssues)
- [Get Project Components Paginated](/docs/operations/project-components.md#getProjectComponentsPaginated)
- [Get Project Components](/docs/operations/project-components.md#getProjectComponents)

#### Project Email
- [Get Project's Sender Email](/docs/operations/project-email.md#getProjectEmail)
- [Set Project's Sender Email](/docs/operations/project-email.md#updateProjectEmail)

#### Project Features
- [Get Project Features](/docs/operations/project-features.md#getFeaturesForProject)
- [Set Project Feature State](/docs/operations/project-features.md#toggleFeatureForProject)

#### Project Key And Name Validation
- [Validate Project Key](/docs/operations/project-key-and-name-validation.md#validateProjectKey)
- [Get Valid Project Key](/docs/operations/project-key-and-name-validation.md#getValidProjectKey)
- [Get Valid Project Name](/docs/operations/project-key-and-name-validation.md#getValidProjectName)

#### Project Permission Schemes
- [Get Project Issue Security Scheme](/docs/operations/project-permission-schemes.md#getProjectIssueSecurityScheme)
- [Get Assigned Permission Scheme](/docs/operations/project-permission-schemes.md#getAssignedPermissionScheme)
- [Assign Permission Scheme](/docs/operations/project-permission-schemes.md#assignPermissionScheme)
- [Get Project Issue Security Levels](/docs/operations/project-permission-schemes.md#getSecurityLevelsForProject)

#### Project Properties
- [Get Project Property Keys](/docs/operations/project-properties.md#getProjectPropertyKeys)
- [Get Project Property](/docs/operations/project-properties.md#getProjectProperty)
- [Set Project Property](/docs/operations/project-properties.md#setProjectProperty)
- [Delete Project Property](/docs/operations/project-properties.md#deleteProjectProperty)

#### Project Role Actors
- [Set Actors For Project Role](/docs/operations/project-role-actors.md#setActors)
- [Add Actors To Project Role](/docs/operations/project-role-actors.md#addActorUsers)
- [Delete Actors From Project Role](/docs/operations/project-role-actors.md#deleteActor)
- [Get Default Actors For Project Role](/docs/operations/project-role-actors.md#getProjectRoleActorsForRole)
- [Add Default Actors To Project Role](/docs/operations/project-role-actors.md#addProjectRoleActorsToRole)
- [Delete Default Actors From Project Role](/docs/operations/project-role-actors.md#deleteProjectRoleActorsFromRole)

#### Project Roles
- [Get Project Roles For Project](/docs/operations/project-roles.md#getProjectRoles)
- [Get Project Role For Project](/docs/operations/project-roles.md#getProjectRole)
- [Get Project Role Details](/docs/operations/project-roles.md#getProjectRoleDetails)
- [Get All Project Roles](/docs/operations/project-roles.md#getAllProjectRoles)
- [Create Project Role](/docs/operations/project-roles.md#createProjectRole)
- [Get Project Role By ID ](/docs/operations/project-roles.md#getProjectRoleById)
- [Fully Update Project Role](/docs/operations/project-roles.md#fullyUpdateProjectRole)
- [Partial Update Project Role](/docs/operations/project-roles.md#partialUpdateProjectRole)
- [Delete Project Role](/docs/operations/project-roles.md#deleteProjectRole)

#### Project Templates
- [Create Custom Project](/docs/operations/project-templates.md#createProjectWithCustomTemplate)

#### Project Types
- [Get All Project Types](/docs/operations/project-types.md#getAllProjectTypes)
- [Get Licensed Project Types](/docs/operations/project-types.md#getAllAccessibleProjectTypes)
- [Get Project Type By Key](/docs/operations/project-types.md#getProjectTypeByKey)
- [Get Accessible Project Type By Key](/docs/operations/project-types.md#getAccessibleProjectTypeByKey)

#### Project Versions
- [Get Project Versions Paginated](/docs/operations/project-versions.md#getProjectVersionsPaginated)
- [Get Project Versions](/docs/operations/project-versions.md#getProjectVersions)
- [Create Version](/docs/operations/project-versions.md#createVersion)
- [Get Version](/docs/operations/project-versions.md#getVersion)
- [Update Version](/docs/operations/project-versions.md#updateVersion)
- [Delete Version](/docs/operations/project-versions.md#deleteVersion)
- [Merge Versions](/docs/operations/project-versions.md#mergeVersions)
- [Move Version](/docs/operations/project-versions.md#moveVersion)
- [Get Version's Related Issues Count](/docs/operations/project-versions.md#getVersionRelatedIssues)
- [Get Related Work](/docs/operations/project-versions.md#getRelatedWork)
- [Update Related Work](/docs/operations/project-versions.md#updateRelatedWork)
- [Create Related Work](/docs/operations/project-versions.md#createRelatedWork)
- [Delete And Replace Version](/docs/operations/project-versions.md#deleteAndReplaceVersion)
- [Get Version's Unresolved Issues Count](/docs/operations/project-versions.md#getVersionUnresolvedIssues)
- [Delete Related Work](/docs/operations/project-versions.md#deleteRelatedWork)

#### Projects
- [Get All Projects](/docs/operations/projects.md#getAllProjects)
- [Create Project](/docs/operations/projects.md#createProject)
- [Get Recent Projects](/docs/operations/projects.md#getRecent)
- [Get Projects Paginated](/docs/operations/projects.md#searchProjects)
- [Get Project](/docs/operations/projects.md#getProject)
- [Update Project](/docs/operations/projects.md#updateProject)
- [Delete Project](/docs/operations/projects.md#deleteProject)
- [Archive Project](/docs/operations/projects.md#archiveProject)
- [Delete Project Asynchronously](/docs/operations/projects.md#deleteProjectAsynchronously)
- [Restore Deleted Or Archived Project](/docs/operations/projects.md#restore)
- [Get All Statuses For Project](/docs/operations/projects.md#getAllStatuses)
- [Get Project Issue Type Hierarchy](/docs/operations/projects.md#getHierarchy)
- [Get Project Notification Scheme](/docs/operations/projects.md#getNotificationSchemeForProject)

#### Screen Schemes
- [Get Screen Schemes](/docs/operations/screen-schemes.md#getScreenSchemes)
- [Create Screen Scheme](/docs/operations/screen-schemes.md#createScreenScheme)
- [Update Screen Scheme](/docs/operations/screen-schemes.md#updateScreenScheme)
- [Delete Screen Scheme](/docs/operations/screen-schemes.md#deleteScreenScheme)

#### Screen Tab Fields
- [Get All Screen Tab Fields](/docs/operations/screen-tab-fields.md#getAllScreenTabFields)
- [Add Screen Tab Field](/docs/operations/screen-tab-fields.md#addScreenTabField)
- [Remove Screen Tab Field](/docs/operations/screen-tab-fields.md#removeScreenTabField)
- [Move Screen Tab Field](/docs/operations/screen-tab-fields.md#moveScreenTabField)

#### Screen Tabs
- [Get Bulk Screen Tabs](/docs/operations/screen-tabs.md#getBulkScreenTabs)
- [Get All Screen Tabs](/docs/operations/screen-tabs.md#getAllScreenTabs)
- [Create Screen Tab](/docs/operations/screen-tabs.md#addScreenTab)
- [Update Screen Tab](/docs/operations/screen-tabs.md#renameScreenTab)
- [Delete Screen Tab](/docs/operations/screen-tabs.md#deleteScreenTab)
- [Move Screen Tab](/docs/operations/screen-tabs.md#moveScreenTab)

#### Screens
- [Get Screens For A Field](/docs/operations/screens.md#getScreensForField)
- [Get Screens](/docs/operations/screens.md#getScreens)
- [Create Screen](/docs/operations/screens.md#createScreen)
- [Add Field To Default Screen](/docs/operations/screens.md#addFieldToDefaultScreen)
- [Update Screen](/docs/operations/screens.md#updateScreen)
- [Delete Screen](/docs/operations/screens.md#deleteScreen)
- [Get Available Screen Fields](/docs/operations/screens.md#getAvailableScreenFields)

#### Server Info
- [Get Jira Instance Info](/docs/operations/server-info.md#getServerInfo)

#### Service Registry
- [Retrieve The Attributes Of Service Registries](/docs/operations/service-registry.md#ServiceRegistryResource.services_get)

#### Status
- [Bulk Get Statuses](/docs/operations/status.md#getStatusesById)
- [Bulk Update Statuses](/docs/operations/status.md#updateStatuses)
- [Bulk Create Statuses](/docs/operations/status.md#createStatuses)
- [Bulk Delete Statuses](/docs/operations/status.md#deleteStatusesById)
- [Search Statuses Paginated](/docs/operations/status.md#search)
- [Get Issue Type Usages By Status And Project](/docs/operations/status.md#getProjectIssueTypeUsagesForStatus)
- [Get Project Usages By Status](/docs/operations/status.md#getProjectUsagesForStatus)
- [Get Workflow Usages By Status](/docs/operations/status.md#getWorkflowUsagesForStatus)

#### Tasks
- [Get Task](/docs/operations/tasks.md#getTask)
- [Cancel Task](/docs/operations/tasks.md#cancelTask)

#### Teams In Plan
- [Get Teams In Plan Paginated](/docs/operations/teams-in-plan.md#getTeams)
- [Add Atlassian Team To Plan](/docs/operations/teams-in-plan.md#addAtlassianTeam)
- [Get Atlassian Team In Plan](/docs/operations/teams-in-plan.md#getAtlassianTeam)
- [Update Atlassian Team In Plan](/docs/operations/teams-in-plan.md#updateAtlassianTeam)
- [Remove Atlassian Team From Plan](/docs/operations/teams-in-plan.md#removeAtlassianTeam)
- [Create Plan-Only Team](/docs/operations/teams-in-plan.md#createPlanOnlyTeam)
- [Get Plan-Only Team](/docs/operations/teams-in-plan.md#getPlanOnlyTeam)
- [Update Plan-Only Team](/docs/operations/teams-in-plan.md#updatePlanOnlyTeam)
- [Delete Plan-Only Team](/docs/operations/teams-in-plan.md#deletePlanOnlyTeam)

#### Time Tracking
- [Get Selected Time Tracking Provider](/docs/operations/time-tracking.md#getSelectedTimeTrackingImplementation)
- [Select Time Tracking Provider](/docs/operations/time-tracking.md#selectTimeTrackingImplementation)
- [Get All Time Tracking Providers](/docs/operations/time-tracking.md#getAvailableTimeTrackingImplementations)
- [Get Time Tracking Settings](/docs/operations/time-tracking.md#getSharedTimeTrackingConfiguration)
- [Set Time Tracking Settings](/docs/operations/time-tracking.md#setSharedTimeTrackingConfiguration)

#### UI Modifications Apps
- [Get UI Modifications](/docs/operations/ui-modifications-apps.md#getUiModifications)
- [Create UI Modification](/docs/operations/ui-modifications-apps.md#createUiModification)
- [Update UI Modification](/docs/operations/ui-modifications-apps.md#updateUiModification)
- [Delete UI Modification](/docs/operations/ui-modifications-apps.md#deleteUiModification)

#### User Properties
- [Get User Property Keys](/docs/operations/user-properties.md#getUserPropertyKeys)
- [Get User Property](/docs/operations/user-properties.md#getUserProperty)
- [Set User Property](/docs/operations/user-properties.md#setUserProperty)
- [Delete User Property](/docs/operations/user-properties.md#deleteUserProperty)

#### User Search
- [Find Users Assignable To Projects](/docs/operations/user-search.md#findBulkAssignableUsers)
- [Find Users Assignable To Issues](/docs/operations/user-search.md#findAssignableUsers)
- [Find Users With Permissions](/docs/operations/user-search.md#findUsersWithAllPermissions)
- [Find Users For Picker](/docs/operations/user-search.md#findUsersForPicker)
- [Find Users](/docs/operations/user-search.md#findUsers)
- [Find Users By Query](/docs/operations/user-search.md#findUsersByQuery)
- [Find User Keys By Query](/docs/operations/user-search.md#findUserKeysByQuery)
- [Find Users With Browse Permission](/docs/operations/user-search.md#findUsersWithBrowsePermission)

#### Usernavproperties
- [Get User Nav Property](/docs/operations/usernavproperties.md#getUserNavProperty)
- [Set User Nav Property](/docs/operations/usernavproperties.md#setUserNavProperty)

#### Users
- [Get User](/docs/operations/users.md#getUser)
- [Create User](/docs/operations/users.md#createUser)
- [Delete User](/docs/operations/users.md#removeUser)
- [Bulk Get Users](/docs/operations/users.md#bulkGetUsers)
- [Get Account I Ds For Users](/docs/operations/users.md#bulkGetUsersMigration)
- [Get User Default Columns](/docs/operations/users.md#getUserDefaultColumns)
- [Set User Default Columns](/docs/operations/users.md#setUserColumns)
- [Reset User Default Columns](/docs/operations/users.md#resetUserColumns)
- [Get User Email](/docs/operations/users.md#getUserEmail)
- [Get User Email Bulk](/docs/operations/users.md#getUserEmailBulk)
- [Get User Groups](/docs/operations/users.md#getUserGroups)
- [Get All Users Default](/docs/operations/users.md#getAllUsersDefault)
- [Get All Users](/docs/operations/users.md#getAllUsers)

#### Webhooks
- [Get Dynamic Webhooks For App](/docs/operations/webhooks.md#getDynamicWebhooksForApp)
- [Register Dynamic Webhooks](/docs/operations/webhooks.md#registerDynamicWebhooks)
- [Delete Webhooks By ID ](/docs/operations/webhooks.md#deleteWebhookById)
- [Get Failed Webhooks](/docs/operations/webhooks.md#getFailedWebhooks)
- [Extend Webhook Life](/docs/operations/webhooks.md#refreshWebhooks)

#### Workflow Scheme Drafts
- [Create Draft Workflow Scheme](/docs/operations/workflow-scheme-drafts.md#createWorkflowSchemeDraftFromParent)
- [Get Draft Workflow Scheme](/docs/operations/workflow-scheme-drafts.md#getWorkflowSchemeDraft)
- [Update Draft Workflow Scheme](/docs/operations/workflow-scheme-drafts.md#updateWorkflowSchemeDraft)
- [Delete Draft Workflow Scheme](/docs/operations/workflow-scheme-drafts.md#deleteWorkflowSchemeDraft)
- [Get Draft Default Workflow](/docs/operations/workflow-scheme-drafts.md#getDraftDefaultWorkflow)
- [Update Draft Default Workflow](/docs/operations/workflow-scheme-drafts.md#updateDraftDefaultWorkflow)
- [Delete Draft Default Workflow](/docs/operations/workflow-scheme-drafts.md#deleteDraftDefaultWorkflow)
- [Get Workflow For Issue Type In Draft Workflow Scheme](/docs/operations/workflow-scheme-drafts.md#getWorkflowSchemeDraftIssueType)
- [Set Workflow For Issue Type In Draft Workflow Scheme](/docs/operations/workflow-scheme-drafts.md#setWorkflowSchemeDraftIssueType)
- [Delete Workflow For Issue Type In Draft Workflow Scheme](/docs/operations/workflow-scheme-drafts.md#deleteWorkflowSchemeDraftIssueType)
- [Publish Draft Workflow Scheme](/docs/operations/workflow-scheme-drafts.md#publishDraftWorkflowScheme)
- [Get Issue Types For Workflows In Draft Workflow Scheme](/docs/operations/workflow-scheme-drafts.md#getDraftWorkflow)
- [Set Issue Types For Workflow In Workflow Scheme](/docs/operations/workflow-scheme-drafts.md#updateDraftWorkflowMapping)
- [Delete Issue Types For Workflow In Draft Workflow Scheme](/docs/operations/workflow-scheme-drafts.md#deleteDraftWorkflowMapping)

#### Workflow Scheme Project Associations
- [Get Workflow Scheme Project Associations](/docs/operations/workflow-scheme-project-associations.md#getWorkflowSchemeProjectAssociations)
- [Assign Workflow Scheme To Project](/docs/operations/workflow-scheme-project-associations.md#assignSchemeToProject)

#### Workflow Schemes
- [Get All Workflow Schemes](/docs/operations/workflow-schemes.md#getAllWorkflowSchemes)
- [Create Workflow Scheme](/docs/operations/workflow-schemes.md#createWorkflowScheme)
- [Bulk Get Workflow Schemes](/docs/operations/workflow-schemes.md#readWorkflowSchemes)
- [Update Workflow Scheme](/docs/operations/workflow-schemes.md#updateSchemes)
- [Get Required Status Mappings For Workflow Scheme Update](/docs/operations/workflow-schemes.md#updateWorkflowSchemeMappings)
- [Get Workflow Scheme](/docs/operations/workflow-schemes.md#getWorkflowScheme)
- [Classic Update Workflow Scheme](/docs/operations/workflow-schemes.md#updateWorkflowScheme)
- [Delete Workflow Scheme](/docs/operations/workflow-schemes.md#deleteWorkflowScheme)
- [Get Default Workflow](/docs/operations/workflow-schemes.md#getDefaultWorkflow)
- [Update Default Workflow](/docs/operations/workflow-schemes.md#updateDefaultWorkflow)
- [Delete Default Workflow](/docs/operations/workflow-schemes.md#deleteDefaultWorkflow)
- [Get Workflow For Issue Type In Workflow Scheme](/docs/operations/workflow-schemes.md#getWorkflowSchemeIssueType)
- [Set Workflow For Issue Type In Workflow Scheme](/docs/operations/workflow-schemes.md#setWorkflowSchemeIssueType)
- [Delete Workflow For Issue Type In Workflow Scheme](/docs/operations/workflow-schemes.md#deleteWorkflowSchemeIssueType)
- [Get Issue Types For Workflows In Workflow Scheme](/docs/operations/workflow-schemes.md#getWorkflow)
- [Set Issue Types For Workflow In Workflow Scheme](/docs/operations/workflow-schemes.md#updateWorkflowMapping)
- [Delete Issue Types For Workflow In Workflow Scheme](/docs/operations/workflow-schemes.md#deleteWorkflowMapping)
- [Get Projects Which Are Using A Given Workflow Scheme](/docs/operations/workflow-schemes.md#getProjectUsagesForWorkflowScheme)

#### Workflow Status Categories
- [Get All Status Categories](/docs/operations/workflow-status-categories.md#getStatusCategories)
- [Get Status Category](/docs/operations/workflow-status-categories.md#getStatusCategory)

#### Workflow Statuses
- [Get All Statuses](/docs/operations/workflow-statuses.md#getStatuses)
- [Get Status](/docs/operations/workflow-statuses.md#getStatus)

#### Workflow Transition Properties
- [Get Workflow Transition Properties](/docs/operations/workflow-transition-properties.md#getWorkflowTransitionProperties)
- [Update Workflow Transition Property](/docs/operations/workflow-transition-properties.md#updateWorkflowTransitionProperty)
- [Create Workflow Transition Property](/docs/operations/workflow-transition-properties.md#createWorkflowTransitionProperty)
- [Delete Workflow Transition Property](/docs/operations/workflow-transition-properties.md#deleteWorkflowTransitionProperty)

#### Workflow Transition Rules
- [Get Workflow Transition Rule Configurations](/docs/operations/workflow-transition-rules.md#getWorkflowTransitionRuleConfigurations)
- [Update Workflow Transition Rule Configurations](/docs/operations/workflow-transition-rules.md#updateWorkflowTransitionRuleConfigurations)
- [Delete Workflow Transition Rule Configurations](/docs/operations/workflow-transition-rules.md#deleteWorkflowTransitionRuleConfigurations)

#### Workflows
- [Get All Workflows](/docs/operations/workflows.md#getAllWorkflows)
- [Create Workflow](/docs/operations/workflows.md#createWorkflow)
- [Get Workflows Paginated](/docs/operations/workflows.md#getWorkflowsPaginated)
- [Delete Inactive Workflow](/docs/operations/workflows.md#deleteInactiveWorkflow)
- [Get Issue Types In A Project That Are Using A Given Workflow](/docs/operations/workflows.md#getWorkflowProjectIssueTypeUsages)
- [Get Projects Using A Given Workflow](/docs/operations/workflows.md#getProjectUsagesForWorkflow)
- [Get Workflow Schemes Which Are Using A Given Workflow](/docs/operations/workflows.md#getWorkflowSchemeUsagesForWorkflow)
- [Bulk Get Workflows](/docs/operations/workflows.md#readWorkflows)
- [Get Available Workflow Capabilities](/docs/operations/workflows.md#workflowCapabilities)
- [Bulk Create Workflows](/docs/operations/workflows.md#createWorkflows)
- [Validate Create Workflows](/docs/operations/workflows.md#validateCreateWorkflows)
- [Search Workflows](/docs/operations/workflows.md#searchWorkflows)
- [Bulk Update Workflows](/docs/operations/workflows.md#updateWorkflows)
- [Validate Update Workflows](/docs/operations/workflows.md#validateUpdateWorkflows)


### 2. Schema
<a name="schema"></a>

#### A
- [ActorInputBean](/docs/schema/actor-input-bean.md)
- [ActorsMap](/docs/schema/actors-map.md)
- [AddAtlassianTeamRequest](/docs/schema/add-atlassian-team-request.md)
- [AddFieldBean](/docs/schema/add-field-bean.md)
- [AddGroupBean](/docs/schema/add-group-bean.md)
- [AddNotificationsDetails](/docs/schema/add-notifications-details.md)
- [AddSecuritySchemeLevelsRequestBean](/docs/schema/add-security-scheme-levels-request-bean.md)
- [AnnouncementBannerConfiguration](/docs/schema/announcement-banner-configuration.md)
- [AnnouncementBannerConfigurationUpdate](/docs/schema/announcement-banner-configuration-update.md)
- [AppWorkflowTransitionRule](/docs/schema/app-workflow-transition-rule.md)
- [Application](/docs/schema/application.md)
- [ApplicationProperty](/docs/schema/application-property.md)
- [ApplicationRole](/docs/schema/application-role.md)
- [ApprovalConfiguration](/docs/schema/approval-configuration.md)
- [ArchiveIssueAsyncRequest](/docs/schema/archive-issue-async-request.md)
- [ArchivedIssuesFilterRequest](/docs/schema/archived-issues-filter-request.md)
- [AssociateFieldConfigurationsWithIssueTypesRequest](/docs/schema/associate-field-configurations-with-issue-types-request.md)
- [AssociateSecuritySchemeWithProjectDetails](/docs/schema/associate-security-scheme-with-project-details.md)
- [AssociatedItemBean](/docs/schema/associated-item-bean.md)
- [AssociationContextObject](/docs/schema/association-context-object.md)
- [Attachment](/docs/schema/attachment.md)
- [AttachmentArchive](/docs/schema/attachment-archive.md)
- [AttachmentArchiveEntry](/docs/schema/attachment-archive-entry.md)
- [AttachmentArchiveImpl](/docs/schema/attachment-archive-impl.md)
- [AttachmentArchiveItemReadable](/docs/schema/attachment-archive-item-readable.md)
- [AttachmentArchiveMetadataReadable](/docs/schema/attachment-archive-metadata-readable.md)
- [AttachmentMetadata](/docs/schema/attachment-metadata.md)
- [AttachmentSettings](/docs/schema/attachment-settings.md)
- [AuditRecordBean](/docs/schema/audit-record-bean.md)
- [AuditRecords](/docs/schema/audit-records.md)
- [AutoCompleteSuggestion](/docs/schema/auto-complete-suggestion.md)
- [AutoCompleteSuggestions](/docs/schema/auto-complete-suggestions.md)
- [AvailableDashboardGadget](/docs/schema/available-dashboard-gadget.md)
- [AvailableDashboardGadgetsResponse](/docs/schema/available-dashboard-gadgets-response.md)
- [AvailableWorkflowConnectRule](/docs/schema/available-workflow-connect-rule.md)
- [AvailableWorkflowForgeRule](/docs/schema/available-workflow-forge-rule.md)
- [AvailableWorkflowSystemRule](/docs/schema/available-workflow-system-rule.md)
- [AvailableWorkflowTriggerTypes](/docs/schema/available-workflow-trigger-types.md)
- [AvailableWorkflowTriggers](/docs/schema/available-workflow-triggers.md)
- [Avatar](/docs/schema/avatar.md)
- [AvatarUrlsBean](/docs/schema/avatar-urls-bean.md)
- [Avatars](/docs/schema/avatars.md)

#### B
- [BoardColumnPayload](/docs/schema/board-column-payload.md)
- [BoardFeaturePayload](/docs/schema/board-feature-payload.md)
- [BoardPayload](/docs/schema/board-payload.md)
- [BoardsPayload](/docs/schema/boards-payload.md)
- [BulkChangeOwnerDetails](/docs/schema/bulk-change-owner-details.md)
- [BulkChangelogRequestBean](/docs/schema/bulk-changelog-request-bean.md)
- [BulkChangelogResponseBean](/docs/schema/bulk-changelog-response-bean.md)
- [BulkContextualConfiguration](/docs/schema/bulk-contextual-configuration.md)
- [BulkCustomFieldOptionCreateRequest](/docs/schema/bulk-custom-field-option-create-request.md)
- [BulkCustomFieldOptionUpdateRequest](/docs/schema/bulk-custom-field-option-update-request.md)
- [BulkEditActionError](/docs/schema/bulk-edit-action-error.md)
- [BulkEditGetFields](/docs/schema/bulk-edit-get-fields.md)
- [BulkEditShareableEntityRequest](/docs/schema/bulk-edit-shareable-entity-request.md)
- [BulkEditShareableEntityResponse](/docs/schema/bulk-edit-shareable-entity-response.md)
- [BulkFetchIssueRequestBean](/docs/schema/bulk-fetch-issue-request-bean.md)
- [BulkIssueIsWatching](/docs/schema/bulk-issue-is-watching.md)
- [BulkIssuePropertyUpdateRequest](/docs/schema/bulk-issue-property-update-request.md)
- [BulkIssueResults](/docs/schema/bulk-issue-results.md)
- [BulkOperationErrorResponse](/docs/schema/bulk-operation-error-response.md)
- [BulkOperationErrorResult](/docs/schema/bulk-operation-error-result.md)
- [BulkOperationProgress](/docs/schema/bulk-operation-progress.md)
- [BulkPermissionGrants](/docs/schema/bulk-permission-grants.md)
- [BulkPermissionsRequestBean](/docs/schema/bulk-permissions-request-bean.md)
- [BulkProjectPermissionGrants](/docs/schema/bulk-project-permission-grants.md)
- [BulkProjectPermissions](/docs/schema/bulk-project-permissions.md)
- [BulkTransitionGetAvailableTransitions](/docs/schema/bulk-transition-get-available-transitions.md)
- [BulkTransitionSubmitInput](/docs/schema/bulk-transition-submit-input.md)

#### C
- [CardLayout](/docs/schema/card-layout.md)
- [ChangeDetails](/docs/schema/change-details.md)
- [ChangeFilterOwner](/docs/schema/change-filter-owner.md)
- [ChangedValueBean](/docs/schema/changed-value-bean.md)
- [ChangedWorklog](/docs/schema/changed-worklog.md)
- [ChangedWorklogs](/docs/schema/changed-worklogs.md)
- [Changelog](/docs/schema/changelog.md)
- [ColumnItem](/docs/schema/column-item.md)
- [ColumnRequestBody](/docs/schema/column-request-body.md)
- [Comment](/docs/schema/comment.md)
- [ComponentIssuesCount](/docs/schema/component-issues-count.md)
- [ComponentJsonBean](/docs/schema/component-json-bean.md)
- [ComponentWithIssueCount](/docs/schema/component-with-issue-count.md)
- [CompoundClause](/docs/schema/compound-clause.md)
- [ConditionGroupConfiguration](/docs/schema/condition-group-configuration.md)
- [ConditionGroupPayload](/docs/schema/condition-group-payload.md)
- [ConditionGroupUpdate](/docs/schema/condition-group-update.md)
- [Configuration](/docs/schema/configuration.md)
- [ConfigurationsListParameters](/docs/schema/configurations-list-parameters.md)
- [ConnectCustomFieldValue](/docs/schema/connect-custom-field-value.md)
- [ConnectCustomFieldValues](/docs/schema/connect-custom-field-values.md)
- [ConnectModule](/docs/schema/connect-module.md)
- [ConnectModules](/docs/schema/connect-modules.md)
- [ConnectWorkflowTransitionRule](/docs/schema/connect-workflow-transition-rule.md)
- [ContainerForProjectFeatures](/docs/schema/container-for-project-features.md)
- [ContainerForRegisteredWebhooks](/docs/schema/container-for-registered-webhooks.md)
- [ContainerForWebhookIDs](/docs/schema/container-for-webhook-i-ds.md)
- [ContainerOfWorkflowSchemeAssociations](/docs/schema/container-of-workflow-scheme-associations.md)
- [Context](/docs/schema/context.md)
- [ContextForProjectAndIssueType](/docs/schema/context-for-project-and-issue-type.md)
- [ContextualConfiguration](/docs/schema/contextual-configuration.md)
- [ConvertedJQLQueries](/docs/schema/converted-jql-queries.md)
- [CreateCrossProjectReleaseRequest](/docs/schema/create-cross-project-release-request.md)
- [CreateCustomFieldContext](/docs/schema/create-custom-field-context.md)
- [CreateCustomFieldRequest](/docs/schema/create-custom-field-request.md)
- [CreateDateFieldRequest](/docs/schema/create-date-field-request.md)
- [CreateExclusionRulesRequest](/docs/schema/create-exclusion-rules-request.md)
- [CreateIssueSecuritySchemeDetails](/docs/schema/create-issue-security-scheme-details.md)
- [CreateIssueSourceRequest](/docs/schema/create-issue-source-request.md)
- [CreateNotificationSchemeDetails](/docs/schema/create-notification-scheme-details.md)
- [CreatePermissionHolderRequest](/docs/schema/create-permission-holder-request.md)
- [CreatePermissionRequest](/docs/schema/create-permission-request.md)
- [CreatePlanOnlyTeamRequest](/docs/schema/create-plan-only-team-request.md)
- [CreatePlanRequest](/docs/schema/create-plan-request.md)
- [CreatePriorityDetails](/docs/schema/create-priority-details.md)
- [CreatePrioritySchemeDetails](/docs/schema/create-priority-scheme-details.md)
- [CreateProjectDetails](/docs/schema/create-project-details.md)
- [CreateResolutionDetails](/docs/schema/create-resolution-details.md)
- [CreateSchedulingRequest](/docs/schema/create-scheduling-request.md)
- [CreateUiModificationDetails](/docs/schema/create-ui-modification-details.md)
- [CreateUpdateRoleRequestBean](/docs/schema/create-update-role-request-bean.md)
- [CreateWorkflowCondition](/docs/schema/create-workflow-condition.md)
- [CreateWorkflowDetails](/docs/schema/create-workflow-details.md)
- [CreateWorkflowStatusDetails](/docs/schema/create-workflow-status-details.md)
- [CreateWorkflowTransitionDetails](/docs/schema/create-workflow-transition-details.md)
- [CreateWorkflowTransitionRule](/docs/schema/create-workflow-transition-rule.md)
- [CreateWorkflowTransitionRulesDetails](/docs/schema/create-workflow-transition-rules-details.md)
- [CreateWorkflowTransitionScreenDetails](/docs/schema/create-workflow-transition-screen-details.md)
- [CreatedIssue](/docs/schema/created-issue.md)
- [CreatedIssues](/docs/schema/created-issues.md)
- [CustomContextVariable](/docs/schema/custom-context-variable.md)
- [CustomFieldConfigurations](/docs/schema/custom-field-configurations.md)
- [CustomFieldContext](/docs/schema/custom-field-context.md)
- [CustomFieldContextDefaultValue](/docs/schema/custom-field-context-default-value.md)
- [CustomFieldContextDefaultValueCascadingOption](/docs/schema/custom-field-context-default-value-cascading-option.md)
- [CustomFieldContextDefaultValueDate](/docs/schema/custom-field-context-default-value-date.md)
- [CustomFieldContextDefaultValueDateTime](/docs/schema/custom-field-context-default-value-date-time.md)
- [CustomFieldContextDefaultValueFloat](/docs/schema/custom-field-context-default-value-float.md)
- [CustomFieldContextDefaultValueForgeDateTimeField](/docs/schema/custom-field-context-default-value-forge-date-time-field.md)
- [CustomFieldContextDefaultValueForgeGroupField](/docs/schema/custom-field-context-default-value-forge-group-field.md)
- [CustomFieldContextDefaultValueForgeMultiGroupField](/docs/schema/custom-field-context-default-value-forge-multi-group-field.md)
- [CustomFieldContextDefaultValueForgeMultiStringField](/docs/schema/custom-field-context-default-value-forge-multi-string-field.md)
- [CustomFieldContextDefaultValueForgeMultiUserField](/docs/schema/custom-field-context-default-value-forge-multi-user-field.md)
- [CustomFieldContextDefaultValueForgeNumberField](/docs/schema/custom-field-context-default-value-forge-number-field.md)
- [CustomFieldContextDefaultValueForgeObjectField](/docs/schema/custom-field-context-default-value-forge-object-field.md)
- [CustomFieldContextDefaultValueForgeStringField](/docs/schema/custom-field-context-default-value-forge-string-field.md)
- [CustomFieldContextDefaultValueForgeUserField](/docs/schema/custom-field-context-default-value-forge-user-field.md)
- [CustomFieldContextDefaultValueLabels](/docs/schema/custom-field-context-default-value-labels.md)
- [CustomFieldContextDefaultValueMultiUserPicker](/docs/schema/custom-field-context-default-value-multi-user-picker.md)
- [CustomFieldContextDefaultValueMultipleGroupPicker](/docs/schema/custom-field-context-default-value-multiple-group-picker.md)
- [CustomFieldContextDefaultValueMultipleOption](/docs/schema/custom-field-context-default-value-multiple-option.md)
- [CustomFieldContextDefaultValueMultipleVersionPicker](/docs/schema/custom-field-context-default-value-multiple-version-picker.md)
- [CustomFieldContextDefaultValueProject](/docs/schema/custom-field-context-default-value-project.md)
- [CustomFieldContextDefaultValueReadOnly](/docs/schema/custom-field-context-default-value-read-only.md)
- [CustomFieldContextDefaultValueSingleGroupPicker](/docs/schema/custom-field-context-default-value-single-group-picker.md)
- [CustomFieldContextDefaultValueSingleOption](/docs/schema/custom-field-context-default-value-single-option.md)
- [CustomFieldContextDefaultValueSingleVersionPicker](/docs/schema/custom-field-context-default-value-single-version-picker.md)
- [CustomFieldContextDefaultValueTextArea](/docs/schema/custom-field-context-default-value-text-area.md)
- [CustomFieldContextDefaultValueTextField](/docs/schema/custom-field-context-default-value-text-field.md)
- [CustomFieldContextDefaultValueURL](/docs/schema/custom-field-context-default-value-url.md)
- [CustomFieldContextDefaultValueUpdate](/docs/schema/custom-field-context-default-value-update.md)
- [CustomFieldContextOption](/docs/schema/custom-field-context-option.md)
- [CustomFieldContextProjectMapping](/docs/schema/custom-field-context-project-mapping.md)
- [CustomFieldContextSingleUserPickerDefaults](/docs/schema/custom-field-context-single-user-picker-defaults.md)
- [CustomFieldContextUpdateDetails](/docs/schema/custom-field-context-update-details.md)
- [CustomFieldCreatedContextOptionsList](/docs/schema/custom-field-created-context-options-list.md)
- [CustomFieldDefinitionJsonBean](/docs/schema/custom-field-definition-json-bean.md)
- [CustomFieldOption](/docs/schema/custom-field-option.md)
- [CustomFieldOptionCreate](/docs/schema/custom-field-option-create.md)
- [CustomFieldOptionUpdate](/docs/schema/custom-field-option-update.md)
- [CustomFieldPayload](/docs/schema/custom-field-payload.md)
- [CustomFieldReplacement](/docs/schema/custom-field-replacement.md)
- [CustomFieldUpdatedContextOptionsList](/docs/schema/custom-field-updated-context-options-list.md)
- [CustomFieldValueUpdate](/docs/schema/custom-field-value-update.md)
- [CustomFieldValueUpdateDetails](/docs/schema/custom-field-value-update-details.md)
- [CustomTemplateRequestDTO](/docs/schema/custom-template-request-dto.md)
- [CustomTemplatesProjectDetails](/docs/schema/custom-templates-project-details.md)

#### D
- [Dashboard](/docs/schema/dashboard.md)
- [DashboardDetails](/docs/schema/dashboard-details.md)
- [DashboardGadget](/docs/schema/dashboard-gadget.md)
- [DashboardGadgetPosition](/docs/schema/dashboard-gadget-position.md)
- [DashboardGadgetResponse](/docs/schema/dashboard-gadget-response.md)
- [DashboardGadgetSettings](/docs/schema/dashboard-gadget-settings.md)
- [DashboardGadgetUpdateRequest](/docs/schema/dashboard-gadget-update-request.md)
- [DataClassificationLevelsBean](/docs/schema/data-classification-levels-bean.md)
- [DataClassificationTagBean](/docs/schema/data-classification-tag-bean.md)
- [DateRangeFilterRequest](/docs/schema/date-range-filter-request.md)
- [DefaultLevelValue](/docs/schema/default-level-value.md)
- [DefaultShareScope](/docs/schema/default-share-scope.md)
- [DefaultWorkflow](/docs/schema/default-workflow.md)
- [DeleteAndReplaceVersionBean](/docs/schema/delete-and-replace-version-bean.md)
- [DeprecatedWorkflow](/docs/schema/deprecated-workflow.md)
- [DetailedErrorCollection](/docs/schema/detailed-error-collection.md)
- [DocumentVersion](/docs/schema/document-version.md)
- [DuplicatePlanRequest](/docs/schema/duplicate-plan-request.md)

#### E
- [EntityProperty](/docs/schema/entity-property.md)
- [EntityPropertyDetails](/docs/schema/entity-property-details.md)
- [Error](/docs/schema/error.md)
- [ErrorCollection](/docs/schema/error-collection.md)
- [ErrorCollections](/docs/schema/error-collections.md)
- [ErrorMessage](/docs/schema/error-message.md)
- [Errors](/docs/schema/errors.md)
- [EventNotification](/docs/schema/event-notification.md)
- [ExpandPrioritySchemeBean](/docs/schema/expand-priority-scheme-bean.md)
- [ExpandPrioritySchemePage](/docs/schema/expand-priority-scheme-page.md)
- [ExportArchivedIssuesTaskProgressResponse](/docs/schema/export-archived-issues-task-progress-response.md)

#### F
- [FailedWebhook](/docs/schema/failed-webhook.md)
- [FailedWebhooks](/docs/schema/failed-webhooks.md)
- [Field](/docs/schema/field.md)
- [FieldAssociationsRequest](/docs/schema/field-associations-request.md)
- [FieldCapabilityPayload](/docs/schema/field-capability-payload.md)
- [FieldChangedClause](/docs/schema/field-changed-clause.md)
- [FieldConfiguration](/docs/schema/field-configuration.md)
- [FieldConfigurationDetails](/docs/schema/field-configuration-details.md)
- [FieldConfigurationIssueTypeItem](/docs/schema/field-configuration-issue-type-item.md)
- [FieldConfigurationItem](/docs/schema/field-configuration-item.md)
- [FieldConfigurationItemsDetails](/docs/schema/field-configuration-items-details.md)
- [FieldConfigurationScheme](/docs/schema/field-configuration-scheme.md)
- [FieldConfigurationSchemeProjectAssociation](/docs/schema/field-configuration-scheme-project-association.md)
- [FieldConfigurationSchemeProjects](/docs/schema/field-configuration-scheme-projects.md)
- [FieldConfigurationToIssueTypeMapping](/docs/schema/field-configuration-to-issue-type-mapping.md)
- [FieldCreateMetadata](/docs/schema/field-create-metadata.md)
- [FieldDetails](/docs/schema/field-details.md)
- [FieldIdIdentifier](/docs/schema/field-id-identifier.md)
- [FieldIdentifierObject](/docs/schema/field-identifier-object.md)
- [FieldLastUsed](/docs/schema/field-last-used.md)
- [FieldLayoutConfiguration](/docs/schema/field-layout-configuration.md)
- [FieldLayoutPayload](/docs/schema/field-layout-payload.md)
- [FieldLayoutSchemePayload](/docs/schema/field-layout-scheme-payload.md)
- [FieldMetadata](/docs/schema/field-metadata.md)
- [FieldReferenceData](/docs/schema/field-reference-data.md)
- [FieldUpdateOperation](/docs/schema/field-update-operation.md)
- [FieldValueClause](/docs/schema/field-value-clause.md)
- [FieldWasClause](/docs/schema/field-was-clause.md)
- [Fields](/docs/schema/fields.md)
- [Filter](/docs/schema/filter.md)
- [FilterDetails](/docs/schema/filter-details.md)
- [FilterSubscription](/docs/schema/filter-subscription.md)
- [FilterSubscriptionsList](/docs/schema/filter-subscriptions-list.md)
- [FoundGroup](/docs/schema/found-group.md)
- [FoundGroups](/docs/schema/found-groups.md)
- [FoundUsers](/docs/schema/found-users.md)
- [FoundUsersAndGroups](/docs/schema/found-users-and-groups.md)
- [FromLayoutPayload](/docs/schema/from-layout-payload.md)
- [FunctionOperand](/docs/schema/function-operand.md)
- [FunctionReferenceData](/docs/schema/function-reference-data.md)

#### G
- [GetAtlassianTeamResponse](/docs/schema/get-atlassian-team-response.md)
- [GetCrossProjectReleaseResponse](/docs/schema/get-cross-project-release-response.md)
- [GetCustomFieldResponse](/docs/schema/get-custom-field-response.md)
- [GetDateFieldResponse](/docs/schema/get-date-field-response.md)
- [GetExclusionRulesResponse](/docs/schema/get-exclusion-rules-response.md)
- [GetIssueSourceResponse](/docs/schema/get-issue-source-response.md)
- [GetPermissionHolderResponse](/docs/schema/get-permission-holder-response.md)
- [GetPermissionResponse](/docs/schema/get-permission-response.md)
- [GetPlanOnlyTeamResponse](/docs/schema/get-plan-only-team-response.md)
- [GetPlanResponse](/docs/schema/get-plan-response.md)
- [GetPlanResponseForPage](/docs/schema/get-plan-response-for-page.md)
- [GetSchedulingResponse](/docs/schema/get-scheduling-response.md)
- [GetTeamResponseForPage](/docs/schema/get-team-response-for-page.md)
- [GlobalScopeBean](/docs/schema/global-scope-bean.md)
- [Group](/docs/schema/group.md)
- [GroupDetails](/docs/schema/group-details.md)
- [GroupLabel](/docs/schema/group-label.md)
- [GroupName](/docs/schema/group-name.md)

#### H
- [HealthCheckResult](/docs/schema/health-check-result.md)
- [Hierarchy](/docs/schema/hierarchy.md)
- [HistoryMetadata](/docs/schema/history-metadata.md)
- [HistoryMetadataParticipant](/docs/schema/history-metadata-participant.md)

#### I
- [Icon](/docs/schema/icon.md)
- [IconBean](/docs/schema/icon-bean.md)
- [IdBean](/docs/schema/id-bean.md)
- [IdOrKeyBean](/docs/schema/id-or-key-bean.md)
- [IdSearchRequestBean](/docs/schema/id-search-request-bean.md)
- [IdSearchResults](/docs/schema/id-search-results.md)
- [IncludedFields](/docs/schema/included-fields.md)
- [InputStreamSource](/docs/schema/input-stream-source.md)
- [IssueArchivalSyncRequest](/docs/schema/issue-archival-sync-request.md)
- [IssueArchivalSyncResponse](/docs/schema/issue-archival-sync-response.md)
- [IssueBean](/docs/schema/issue-bean.md)
- [IssueBulkDeletePayload](/docs/schema/issue-bulk-delete-payload.md)
- [IssueBulkEditField](/docs/schema/issue-bulk-edit-field.md)
- [IssueBulkEditPayload](/docs/schema/issue-bulk-edit-payload.md)
- [IssueBulkMovePayload](/docs/schema/issue-bulk-move-payload.md)
- [IssueBulkOperationsFieldOption](/docs/schema/issue-bulk-operations-field-option.md)
- [IssueBulkTransitionForWorkflow](/docs/schema/issue-bulk-transition-for-workflow.md)
- [IssueBulkTransitionPayload](/docs/schema/issue-bulk-transition-payload.md)
- [IssueBulkWatchOrUnwatchPayload](/docs/schema/issue-bulk-watch-or-unwatch-payload.md)
- [IssueChangeLog](/docs/schema/issue-change-log.md)
- [IssueChangelogIds](/docs/schema/issue-changelog-ids.md)
- [IssueCommentListRequestBean](/docs/schema/issue-comment-list-request-bean.md)
- [IssueContextVariable](/docs/schema/issue-context-variable.md)
- [IssueCreateMetadata](/docs/schema/issue-create-metadata.md)
- [IssueEntityProperties](/docs/schema/issue-entity-properties.md)
- [IssueEntityPropertiesForMultiUpdate](/docs/schema/issue-entity-properties-for-multi-update.md)
- [IssueError](/docs/schema/issue-error.md)
- [IssueEvent](/docs/schema/issue-event.md)
- [IssueFieldOption](/docs/schema/issue-field-option.md)
- [IssueFieldOptionConfiguration](/docs/schema/issue-field-option-configuration.md)
- [IssueFieldOptionCreateBean](/docs/schema/issue-field-option-create-bean.md)
- [IssueFieldOptionScopeBean](/docs/schema/issue-field-option-scope-bean.md)
- [IssueFilterForBulkPropertyDelete](/docs/schema/issue-filter-for-bulk-property-delete.md)
- [IssueFilterForBulkPropertySet](/docs/schema/issue-filter-for-bulk-property-set.md)
- [IssueLayouItemtPayload](/docs/schema/issue-layou-itemt-payload.md)
- [IssueLayoutPayload](/docs/schema/issue-layout-payload.md)
- [IssueLimitReportResponseBean](/docs/schema/issue-limit-report-response-bean.md)
- [IssueLink](/docs/schema/issue-link.md)
- [IssueLinkType](/docs/schema/issue-link-type.md)
- [IssueLinkTypes](/docs/schema/issue-link-types.md)
- [IssueList](/docs/schema/issue-list.md)
- [IssueMatches](/docs/schema/issue-matches.md)
- [IssueMatchesForJQL](/docs/schema/issue-matches-for-jql.md)
- [IssuePickerSuggestions](/docs/schema/issue-picker-suggestions.md)
- [IssuePickerSuggestionsIssueType](/docs/schema/issue-picker-suggestions-issue-type.md)
- [IssueSecurityLevelMember](/docs/schema/issue-security-level-member.md)
- [IssueSecuritySchemeToProjectMapping](/docs/schema/issue-security-scheme-to-project-mapping.md)
- [IssueTransition](/docs/schema/issue-transition.md)
- [IssueTransitionStatus](/docs/schema/issue-transition-status.md)
- [IssueTypeCreateBean](/docs/schema/issue-type-create-bean.md)
- [IssueTypeDetails](/docs/schema/issue-type-details.md)
- [IssueTypeHierarchyPayload](/docs/schema/issue-type-hierarchy-payload.md)
- [IssueTypeIds](/docs/schema/issue-type-ids.md)
- [IssueTypeIdsToRemove](/docs/schema/issue-type-ids-to-remove.md)
- [IssueTypeInfo](/docs/schema/issue-type-info.md)
- [IssueTypeIssueCreateMetadata](/docs/schema/issue-type-issue-create-metadata.md)
- [IssueTypePayload](/docs/schema/issue-type-payload.md)
- [IssueTypeProjectCreatePayload](/docs/schema/issue-type-project-create-payload.md)
- [IssueTypeScheme](/docs/schema/issue-type-scheme.md)
- [IssueTypeSchemeDetails](/docs/schema/issue-type-scheme-details.md)
- [IssueTypeSchemeID](/docs/schema/issue-type-scheme-id.md)
- [IssueTypeSchemeMapping](/docs/schema/issue-type-scheme-mapping.md)
- [IssueTypeSchemePayload](/docs/schema/issue-type-scheme-payload.md)
- [IssueTypeSchemeProjectAssociation](/docs/schema/issue-type-scheme-project-association.md)
- [IssueTypeSchemeProjects](/docs/schema/issue-type-scheme-projects.md)
- [IssueTypeSchemeUpdateDetails](/docs/schema/issue-type-scheme-update-details.md)
- [IssueTypeScreenScheme](/docs/schema/issue-type-screen-scheme.md)
- [IssueTypeScreenSchemeDetails](/docs/schema/issue-type-screen-scheme-details.md)
- [IssueTypeScreenSchemeId](/docs/schema/issue-type-screen-scheme-id.md)
- [IssueTypeScreenSchemeItem](/docs/schema/issue-type-screen-scheme-item.md)
- [IssueTypeScreenSchemeMapping](/docs/schema/issue-type-screen-scheme-mapping.md)
- [IssueTypeScreenSchemeMappingDetails](/docs/schema/issue-type-screen-scheme-mapping-details.md)
- [IssueTypeScreenSchemePayload](/docs/schema/issue-type-screen-scheme-payload.md)
- [IssueTypeScreenSchemeProjectAssociation](/docs/schema/issue-type-screen-scheme-project-association.md)
- [IssueTypeScreenSchemeUpdateDetails](/docs/schema/issue-type-screen-scheme-update-details.md)
- [IssueTypeScreenSchemesProjects](/docs/schema/issue-type-screen-schemes-projects.md)
- [IssueTypeToContextMapping](/docs/schema/issue-type-to-context-mapping.md)
- [IssueTypeUpdateBean](/docs/schema/issue-type-update-bean.md)
- [IssueTypeWithStatus](/docs/schema/issue-type-with-status.md)
- [IssueTypeWorkflowMapping](/docs/schema/issue-type-workflow-mapping.md)
- [IssueTypesWorkflowMapping](/docs/schema/issue-types-workflow-mapping.md)
- [IssueUpdateDetails](/docs/schema/issue-update-details.md)
- [IssueUpdateMetadata](/docs/schema/issue-update-metadata.md)
- [IssuesAndJQLQueries](/docs/schema/issues-and-jql-queries.md)
- [IssuesJqlMetaDataBean](/docs/schema/issues-jql-meta-data-bean.md)
- [IssuesMetaBean](/docs/schema/issues-meta-bean.md)
- [IssuesUpdateBean](/docs/schema/issues-update-bean.md)

#### J
- [JExpEvaluateIssuesJqlMetaDataBean](/docs/schema/j-exp-evaluate-issues-jql-meta-data-bean.md)
- [JExpEvaluateIssuesMetaBean](/docs/schema/j-exp-evaluate-issues-meta-bean.md)
- [JExpEvaluateJiraExpressionResultBean](/docs/schema/j-exp-evaluate-jira-expression-result-bean.md)
- [JExpEvaluateMetaDataBean](/docs/schema/j-exp-evaluate-meta-data-bean.md)
- [JQLCountRequestBean](/docs/schema/jql-count-request-bean.md)
- [JQLCountResultsBean](/docs/schema/jql-count-results-bean.md)
- [JQLPersonalDataMigrationRequest](/docs/schema/jql-personal-data-migration-request.md)
- [JQLQueryWithUnknownUsers](/docs/schema/jql-query-with-unknown-users.md)
- [JQLReferenceData](/docs/schema/jql-reference-data.md)
- [JexpEvaluateCtxIssues](/docs/schema/jexp-evaluate-ctx-issues.md)
- [JexpEvaluateCtxJqlIssues](/docs/schema/jexp-evaluate-ctx-jql-issues.md)
- [JexpIssues](/docs/schema/jexp-issues.md)
- [JexpJqlIssues](/docs/schema/jexp-jql-issues.md)
- [JiraCascadingSelectField](/docs/schema/jira-cascading-select-field.md)
- [JiraColorField](/docs/schema/jira-color-field.md)
- [JiraColorInput](/docs/schema/jira-color-input.md)
- [JiraComponentField](/docs/schema/jira-component-field.md)
- [JiraDateField](/docs/schema/jira-date-field.md)
- [JiraDateInput](/docs/schema/jira-date-input.md)
- [JiraDateTimeField](/docs/schema/jira-date-time-field.md)
- [JiraDateTimeInput](/docs/schema/jira-date-time-input.md)
- [JiraDurationField](/docs/schema/jira-duration-field.md)
- [JiraExpressionAnalysis](/docs/schema/jira-expression-analysis.md)
- [JiraExpressionComplexity](/docs/schema/jira-expression-complexity.md)
- [JiraExpressionEvalContextBean](/docs/schema/jira-expression-eval-context-bean.md)
- [JiraExpressionEvalRequestBean](/docs/schema/jira-expression-eval-request-bean.md)
- [JiraExpressionEvaluateContextBean](/docs/schema/jira-expression-evaluate-context-bean.md)
- [JiraExpressionEvaluateRequestBean](/docs/schema/jira-expression-evaluate-request-bean.md)
- [JiraExpressionEvaluationMetaDataBean](/docs/schema/jira-expression-evaluation-meta-data-bean.md)
- [JiraExpressionForAnalysis](/docs/schema/jira-expression-for-analysis.md)
- [JiraExpressionResult](/docs/schema/jira-expression-result.md)
- [JiraExpressionValidationError](/docs/schema/jira-expression-validation-error.md)
- [JiraExpressionsAnalysis](/docs/schema/jira-expressions-analysis.md)
- [JiraExpressionsComplexityBean](/docs/schema/jira-expressions-complexity-bean.md)
- [JiraExpressionsComplexityValueBean](/docs/schema/jira-expressions-complexity-value-bean.md)
- [JiraGroupInput](/docs/schema/jira-group-input.md)
- [JiraIssueFields](/docs/schema/jira-issue-fields.md)
- [JiraIssueTypeField](/docs/schema/jira-issue-type-field.md)
- [JiraLabelsField](/docs/schema/jira-labels-field.md)
- [JiraLabelsInput](/docs/schema/jira-labels-input.md)
- [JiraMultiSelectComponentField](/docs/schema/jira-multi-select-component-field.md)
- [JiraMultipleGroupPickerField](/docs/schema/jira-multiple-group-picker-field.md)
- [JiraMultipleSelectField](/docs/schema/jira-multiple-select-field.md)
- [JiraMultipleSelectUserPickerField](/docs/schema/jira-multiple-select-user-picker-field.md)
- [JiraMultipleVersionPickerField](/docs/schema/jira-multiple-version-picker-field.md)
- [JiraNumberField](/docs/schema/jira-number-field.md)
- [JiraPriorityField](/docs/schema/jira-priority-field.md)
- [JiraRichTextField](/docs/schema/jira-rich-text-field.md)
- [JiraRichTextInput](/docs/schema/jira-rich-text-input.md)
- [JiraSelectedOptionField](/docs/schema/jira-selected-option-field.md)
- [JiraSingleGroupPickerField](/docs/schema/jira-single-group-picker-field.md)
- [JiraSingleLineTextField](/docs/schema/jira-single-line-text-field.md)
- [JiraSingleSelectField](/docs/schema/jira-single-select-field.md)
- [JiraSingleSelectUserPickerField](/docs/schema/jira-single-select-user-picker-field.md)
- [JiraSingleVersionPickerField](/docs/schema/jira-single-version-picker-field.md)
- [JiraStatus](/docs/schema/jira-status.md)
- [JiraStatusInput](/docs/schema/jira-status-input.md)
- [JiraTimeTrackingField](/docs/schema/jira-time-tracking-field.md)
- [JiraUrlField](/docs/schema/jira-url-field.md)
- [JiraUserField](/docs/schema/jira-user-field.md)
- [JiraVersionField](/docs/schema/jira-version-field.md)
- [JiraWorkflow](/docs/schema/jira-workflow.md)
- [JiraWorkflowStatus](/docs/schema/jira-workflow-status.md)
- [JqlFunctionPrecomputationBean](/docs/schema/jql-function-precomputation-bean.md)
- [JqlFunctionPrecomputationGetByIdRequest](/docs/schema/jql-function-precomputation-get-by-id-request.md)
- [JqlFunctionPrecomputationGetByIdResponse](/docs/schema/jql-function-precomputation-get-by-id-response.md)
- [JqlFunctionPrecomputationUpdateBean](/docs/schema/jql-function-precomputation-update-bean.md)
- [JqlFunctionPrecomputationUpdateErrorResponse](/docs/schema/jql-function-precomputation-update-error-response.md)
- [JqlFunctionPrecomputationUpdateRequestBean](/docs/schema/jql-function-precomputation-update-request-bean.md)
- [JqlFunctionPrecomputationUpdateResponse](/docs/schema/jql-function-precomputation-update-response.md)
- [JqlQueriesToParse](/docs/schema/jql-queries-to-parse.md)
- [JqlQueriesToSanitize](/docs/schema/jql-queries-to-sanitize.md)
- [JqlQuery](/docs/schema/jql-query.md)
- [JqlQueryClause](/docs/schema/jql-query-clause.md)
- [JqlQueryClauseOperand](/docs/schema/jql-query-clause-operand.md)
- [JqlQueryClauseTimePredicate](/docs/schema/jql-query-clause-time-predicate.md)
- [JqlQueryField](/docs/schema/jql-query-field.md)
- [JqlQueryFieldEntityProperty](/docs/schema/jql-query-field-entity-property.md)
- [JqlQueryOrderByClause](/docs/schema/jql-query-order-by-clause.md)
- [JqlQueryOrderByClauseElement](/docs/schema/jql-query-order-by-clause-element.md)
- [JqlQueryToSanitize](/docs/schema/jql-query-to-sanitize.md)
- [JqlQueryUnitaryOperand](/docs/schema/jql-query-unitary-operand.md)
- [JsonContextVariable](/docs/schema/json-context-variable.md)
- [JsonNode](/docs/schema/json-node.md)
- [JsonTypeBean](/docs/schema/json-type-bean.md)

#### K
- [KeywordOperand](/docs/schema/keyword-operand.md)

#### L
- [LegacyJackson1ListAttachment](/docs/schema/legacy-jackson1-list-attachment.md)
- [LegacyJackson1ListColumnItem](/docs/schema/legacy-jackson1-list-column-item.md)
- [LegacyJackson1ListIssueEvent](/docs/schema/legacy-jackson1-list-issue-event.md)
- [LegacyJackson1ListIssueTypeWithStatus](/docs/schema/legacy-jackson1-list-issue-type-with-status.md)
- [LegacyJackson1ListProject](/docs/schema/legacy-jackson1-list-project.md)
- [LegacyJackson1ListProjectComponent](/docs/schema/legacy-jackson1-list-project-component.md)
- [LegacyJackson1ListProjectRoleDetails](/docs/schema/legacy-jackson1-list-project-role-details.md)
- [LegacyJackson1ListProjectType](/docs/schema/legacy-jackson1-list-project-type.md)
- [LegacyJackson1ListUserMigrationBean](/docs/schema/legacy-jackson1-list-user-migration-bean.md)
- [LegacyJackson1ListVersion](/docs/schema/legacy-jackson1-list-version.md)
- [LegacyJackson1ListWorklog](/docs/schema/legacy-jackson1-list-worklog.md)
- [License](/docs/schema/license.md)
- [LicenseMetric](/docs/schema/license-metric.md)
- [LicensedApplication](/docs/schema/licensed-application.md)
- [LinkGroup](/docs/schema/link-group.md)
- [LinkIssueRequestJsonBean](/docs/schema/link-issue-request-json-bean.md)
- [LinkedIssue](/docs/schema/linked-issue.md)
- [ListOperand](/docs/schema/list-operand.md)
- [ListWrapperCallbackApplicationRole](/docs/schema/list-wrapper-callback-application-role.md)
- [ListWrapperCallbackGroupName](/docs/schema/list-wrapper-callback-group-name.md)
- [Locale](/docs/schema/locale.md)

#### M
- [MandatoryFieldValue](/docs/schema/mandatory-field-value.md)
- [MandatoryFieldValueForADF](/docs/schema/mandatory-field-value-for-adf.md)
- [MappingsByIssueTypeOverride](/docs/schema/mappings-by-issue-type-override.md)
- [MappingsByWorkflow](/docs/schema/mappings-by-workflow.md)
- [MoveFieldBean](/docs/schema/move-field-bean.md)
- [MultiIssueEntityProperties](/docs/schema/multi-issue-entity-properties.md)
- [MultipartFile](/docs/schema/multipart-file.md)
- [MultipleCustomFieldValuesUpdate](/docs/schema/multiple-custom-field-values-update.md)
- [MultipleCustomFieldValuesUpdateDetails](/docs/schema/multiple-custom-field-values-update-details.md)

#### N
- [NestedResponse](/docs/schema/nested-response.md)
- [NewUserDetails](/docs/schema/new-user-details.md)
- [NonWorkingDay](/docs/schema/non-working-day.md)
- [Notification](/docs/schema/notification.md)
- [NotificationEvent](/docs/schema/notification-event.md)
- [NotificationRecipients](/docs/schema/notification-recipients.md)
- [NotificationRecipientsRestrictions](/docs/schema/notification-recipients-restrictions.md)
- [NotificationScheme](/docs/schema/notification-scheme.md)
- [NotificationSchemeAndProjectMappingJsonBean](/docs/schema/notification-scheme-and-project-mapping-json-bean.md)
- [NotificationSchemeEvent](/docs/schema/notification-scheme-event.md)
- [NotificationSchemeEventDetails](/docs/schema/notification-scheme-event-details.md)
- [NotificationSchemeEventIDPayload](/docs/schema/notification-scheme-event-id-payload.md)
- [NotificationSchemeEventPayload](/docs/schema/notification-scheme-event-payload.md)
- [NotificationSchemeEventTypeId](/docs/schema/notification-scheme-event-type-id.md)
- [NotificationSchemeId](/docs/schema/notification-scheme-id.md)
- [NotificationSchemeNotificationDetails](/docs/schema/notification-scheme-notification-details.md)
- [NotificationSchemeNotificationDetailsPayload](/docs/schema/notification-scheme-notification-details-payload.md)
- [NotificationSchemePayload](/docs/schema/notification-scheme-payload.md)

#### O
- [OldToNewSecurityLevelMappingsBean](/docs/schema/old-to-new-security-level-mappings-bean.md)
- [OperationMessage](/docs/schema/operation-message.md)
- [Operations](/docs/schema/operations.md)
- [OrderOfCustomFieldOptions](/docs/schema/order-of-custom-field-options.md)
- [OrderOfIssueTypes](/docs/schema/order-of-issue-types.md)

#### P
- [PageBean2ComponentJsonBean](/docs/schema/page-bean2-component-json-bean.md)
- [PageBean2JqlFunctionPrecomputationBean](/docs/schema/page-bean2-jql-function-precomputation-bean.md)
- [PageBeanBulkContextualConfiguration](/docs/schema/page-bean-bulk-contextual-configuration.md)
- [PageBeanChangelog](/docs/schema/page-bean-changelog.md)
- [PageBeanComment](/docs/schema/page-bean-comment.md)
- [PageBeanComponentWithIssueCount](/docs/schema/page-bean-component-with-issue-count.md)
- [PageBeanContext](/docs/schema/page-bean-context.md)
- [PageBeanContextForProjectAndIssueType](/docs/schema/page-bean-context-for-project-and-issue-type.md)
- [PageBeanContextualConfiguration](/docs/schema/page-bean-contextual-configuration.md)
- [PageBeanCustomFieldContext](/docs/schema/page-bean-custom-field-context.md)
- [PageBeanCustomFieldContextDefaultValue](/docs/schema/page-bean-custom-field-context-default-value.md)
- [PageBeanCustomFieldContextOption](/docs/schema/page-bean-custom-field-context-option.md)
- [PageBeanCustomFieldContextProjectMapping](/docs/schema/page-bean-custom-field-context-project-mapping.md)
- [PageBeanDashboard](/docs/schema/page-bean-dashboard.md)
- [PageBeanField](/docs/schema/page-bean-field.md)
- [PageBeanFieldConfigurationDetails](/docs/schema/page-bean-field-configuration-details.md)
- [PageBeanFieldConfigurationIssueTypeItem](/docs/schema/page-bean-field-configuration-issue-type-item.md)
- [PageBeanFieldConfigurationItem](/docs/schema/page-bean-field-configuration-item.md)
- [PageBeanFieldConfigurationScheme](/docs/schema/page-bean-field-configuration-scheme.md)
- [PageBeanFieldConfigurationSchemeProjects](/docs/schema/page-bean-field-configuration-scheme-projects.md)
- [PageBeanFilterDetails](/docs/schema/page-bean-filter-details.md)
- [PageBeanGroupDetails](/docs/schema/page-bean-group-details.md)
- [PageBeanIssueFieldOption](/docs/schema/page-bean-issue-field-option.md)
- [PageBeanIssueSecurityLevelMember](/docs/schema/page-bean-issue-security-level-member.md)
- [PageBeanIssueSecuritySchemeToProjectMapping](/docs/schema/page-bean-issue-security-scheme-to-project-mapping.md)
- [PageBeanIssueTypeScheme](/docs/schema/page-bean-issue-type-scheme.md)
- [PageBeanIssueTypeSchemeMapping](/docs/schema/page-bean-issue-type-scheme-mapping.md)
- [PageBeanIssueTypeSchemeProjects](/docs/schema/page-bean-issue-type-scheme-projects.md)
- [PageBeanIssueTypeScreenScheme](/docs/schema/page-bean-issue-type-screen-scheme.md)
- [PageBeanIssueTypeScreenSchemeItem](/docs/schema/page-bean-issue-type-screen-scheme-item.md)
- [PageBeanIssueTypeScreenSchemesProjects](/docs/schema/page-bean-issue-type-screen-schemes-projects.md)
- [PageBeanIssueTypeToContextMapping](/docs/schema/page-bean-issue-type-to-context-mapping.md)
- [PageBeanNotificationScheme](/docs/schema/page-bean-notification-scheme.md)
- [PageBeanNotificationSchemeAndProjectMappingJsonBean](/docs/schema/page-bean-notification-scheme-and-project-mapping-json-bean.md)
- [PageBeanPriority](/docs/schema/page-bean-priority.md)
- [PageBeanPrioritySchemeWithPaginatedPrioritiesAndProjects](/docs/schema/page-bean-priority-scheme-with-paginated-priorities-and-projects.md)
- [PageBeanPriorityWithSequence](/docs/schema/page-bean-priority-with-sequence.md)
- [PageBeanProject](/docs/schema/page-bean-project.md)
- [PageBeanProjectDetails](/docs/schema/page-bean-project-details.md)
- [PageBeanResolutionJsonBean](/docs/schema/page-bean-resolution-json-bean.md)
- [PageBeanScreen](/docs/schema/page-bean-screen.md)
- [PageBeanScreenScheme](/docs/schema/page-bean-screen-scheme.md)
- [PageBeanScreenWithTab](/docs/schema/page-bean-screen-with-tab.md)
- [PageBeanSecurityLevel](/docs/schema/page-bean-security-level.md)
- [PageBeanSecurityLevelMember](/docs/schema/page-bean-security-level-member.md)
- [PageBeanSecuritySchemeWithProjects](/docs/schema/page-bean-security-scheme-with-projects.md)
- [PageBeanString](/docs/schema/page-bean-string.md)
- [PageBeanUiModificationDetails](/docs/schema/page-bean-ui-modification-details.md)
- [PageBeanUser](/docs/schema/page-bean-user.md)
- [PageBeanUserDetails](/docs/schema/page-bean-user-details.md)
- [PageBeanUserKey](/docs/schema/page-bean-user-key.md)
- [PageBeanVersion](/docs/schema/page-bean-version.md)
- [PageBeanWebhook](/docs/schema/page-bean-webhook.md)
- [PageBeanWorkflow](/docs/schema/page-bean-workflow.md)
- [PageBeanWorkflowScheme](/docs/schema/page-bean-workflow-scheme.md)
- [PageBeanWorkflowTransitionRules](/docs/schema/page-bean-workflow-transition-rules.md)
- [PageOfChangelogs](/docs/schema/page-of-changelogs.md)
- [PageOfComments](/docs/schema/page-of-comments.md)
- [PageOfCreateMetaIssueTypeWithField](/docs/schema/page-of-create-meta-issue-type-with-field.md)
- [PageOfCreateMetaIssueTypes](/docs/schema/page-of-create-meta-issue-types.md)
- [PageOfDashboards](/docs/schema/page-of-dashboards.md)
- [PageOfStatuses](/docs/schema/page-of-statuses.md)
- [PageOfWorklogs](/docs/schema/page-of-worklogs.md)
- [PageWithCursorGetPlanResponseForPage](/docs/schema/page-with-cursor-get-plan-response-for-page.md)
- [PageWithCursorGetTeamResponseForPage](/docs/schema/page-with-cursor-get-team-response-for-page.md)
- [PagedListUserDetailsApplicationUser](/docs/schema/paged-list-user-details-application-user.md)
- [PaginatedResponseComment](/docs/schema/paginated-response-comment.md)
- [PaginatedResponseFieldCreateMetadata](/docs/schema/paginated-response-field-create-metadata.md)
- [PaginatedResponseIssueTypeIssueCreateMetadata](/docs/schema/paginated-response-issue-type-issue-create-metadata.md)
- [ParsedJqlQueries](/docs/schema/parsed-jql-queries.md)
- [ParsedJqlQuery](/docs/schema/parsed-jql-query.md)
- [PermissionDetails](/docs/schema/permission-details.md)
- [PermissionGrant](/docs/schema/permission-grant.md)
- [PermissionGrantDTO](/docs/schema/permission-grant-dto.md)
- [PermissionGrants](/docs/schema/permission-grants.md)
- [PermissionHolder](/docs/schema/permission-holder.md)
- [PermissionPayloadDTO](/docs/schema/permission-payload-dto.md)
- [PermissionScheme](/docs/schema/permission-scheme.md)
- [PermissionSchemes](/docs/schema/permission-schemes.md)
- [Permissions](/docs/schema/permissions.md)
- [PermissionsKeysBean](/docs/schema/permissions-keys-bean.md)
- [PermittedProjects](/docs/schema/permitted-projects.md)
- [Priority](/docs/schema/priority.md)
- [PriorityId](/docs/schema/priority-id.md)
- [PriorityMapping](/docs/schema/priority-mapping.md)
- [PrioritySchemeChangesWithoutMappings](/docs/schema/priority-scheme-changes-without-mappings.md)
- [PrioritySchemeId](/docs/schema/priority-scheme-id.md)
- [PrioritySchemeWithPaginatedPrioritiesAndProjects](/docs/schema/priority-scheme-with-paginated-priorities-and-projects.md)
- [PriorityWithSequence](/docs/schema/priority-with-sequence.md)
- [Project](/docs/schema/project.md)
- [ProjectAndIssueTypePair](/docs/schema/project-and-issue-type-pair.md)
- [ProjectAvatars](/docs/schema/project-avatars.md)
- [ProjectCategory](/docs/schema/project-category.md)
- [ProjectComponent](/docs/schema/project-component.md)
- [ProjectCreateResourceIdentifier](/docs/schema/project-create-resource-identifier.md)
- [ProjectCustomTemplateCreateRequestDTO](/docs/schema/project-custom-template-create-request-dto.md)
- [ProjectDataPolicies](/docs/schema/project-data-policies.md)
- [ProjectDataPolicy](/docs/schema/project-data-policy.md)
- [ProjectDetails](/docs/schema/project-details.md)
- [ProjectEmailAddress](/docs/schema/project-email-address.md)
- [ProjectFeature](/docs/schema/project-feature.md)
- [ProjectFeatureState](/docs/schema/project-feature-state.md)
- [ProjectId](/docs/schema/project-id.md)
- [ProjectIdAssociationContext](/docs/schema/project-id-association-context.md)
- [ProjectIdentifierBean](/docs/schema/project-identifier-bean.md)
- [ProjectIdentifiers](/docs/schema/project-identifiers.md)
- [ProjectIds](/docs/schema/project-ids.md)
- [ProjectInsight](/docs/schema/project-insight.md)
- [ProjectIssueCreateMetadata](/docs/schema/project-issue-create-metadata.md)
- [ProjectIssueSecurityLevels](/docs/schema/project-issue-security-levels.md)
- [ProjectIssueTypeHierarchy](/docs/schema/project-issue-type-hierarchy.md)
- [ProjectIssueTypeMapping](/docs/schema/project-issue-type-mapping.md)
- [ProjectIssueTypeMappings](/docs/schema/project-issue-type-mappings.md)
- [ProjectIssueTypes](/docs/schema/project-issue-types.md)
- [ProjectIssueTypesHierarchyLevel](/docs/schema/project-issue-types-hierarchy-level.md)
- [ProjectLandingPageInfo](/docs/schema/project-landing-page-info.md)
- [ProjectPayload](/docs/schema/project-payload.md)
- [ProjectPermissions](/docs/schema/project-permissions.md)
- [ProjectRole](/docs/schema/project-role.md)
- [ProjectRoleActorsUpdateBean](/docs/schema/project-role-actors-update-bean.md)
- [ProjectRoleDetails](/docs/schema/project-role-details.md)
- [ProjectRoleGroup](/docs/schema/project-role-group.md)
- [ProjectRoleUser](/docs/schema/project-role-user.md)
- [ProjectScopeBean](/docs/schema/project-scope-bean.md)
- [ProjectType](/docs/schema/project-type.md)
- [ProjectUsage](/docs/schema/project-usage.md)
- [ProjectUsagePage](/docs/schema/project-usage-page.md)
- [ProjectWithDataPolicy](/docs/schema/project-with-data-policy.md)
- [PropertyKey](/docs/schema/property-key.md)
- [PropertyKeys](/docs/schema/property-keys.md)
- [PublishDraftWorkflowScheme](/docs/schema/publish-draft-workflow-scheme.md)
- [PublishedWorkflowId](/docs/schema/published-workflow-id.md)

#### Q
- [QuickFilterPayload](/docs/schema/quick-filter-payload.md)

#### R
- [RegisteredWebhook](/docs/schema/registered-webhook.md)
- [RemoteIssueLink](/docs/schema/remote-issue-link.md)
- [RemoteIssueLinkIdentifies](/docs/schema/remote-issue-link-identifies.md)
- [RemoteIssueLinkRequest](/docs/schema/remote-issue-link-request.md)
- [RemoteObject](/docs/schema/remote-object.md)
- [RemoveOptionFromIssuesResult](/docs/schema/remove-option-from-issues-result.md)
- [ReorderIssuePriorities](/docs/schema/reorder-issue-priorities.md)
- [ReorderIssueResolutionsRequest](/docs/schema/reorder-issue-resolutions-request.md)
- [RequiredMappingByIssueType](/docs/schema/required-mapping-by-issue-type.md)
- [RequiredMappingByWorkflows](/docs/schema/required-mapping-by-workflows.md)
- [Resolution](/docs/schema/resolution.md)
- [ResolutionId](/docs/schema/resolution-id.md)
- [ResolutionJsonBean](/docs/schema/resolution-json-bean.md)
- [Resource](/docs/schema/resource.md)
- [RestrictedPermission](/docs/schema/restricted-permission.md)
- [RichText](/docs/schema/rich-text.md)
- [RoleActor](/docs/schema/role-actor.md)
- [RolePayload](/docs/schema/role-payload.md)
- [RolesCapabilityPayload](/docs/schema/roles-capability-payload.md)
- [RuleConfiguration](/docs/schema/rule-configuration.md)
- [RulePayload](/docs/schema/rule-payload.md)

#### S
- [SanitizedJqlQueries](/docs/schema/sanitized-jql-queries.md)
- [SanitizedJqlQuery](/docs/schema/sanitized-jql-query.md)
- [Scope](/docs/schema/scope.md)
- [ScopePayload](/docs/schema/scope-payload.md)
- [Screen](/docs/schema/screen.md)
- [ScreenDetails](/docs/schema/screen-details.md)
- [ScreenPayload](/docs/schema/screen-payload.md)
- [ScreenScheme](/docs/schema/screen-scheme.md)
- [ScreenSchemeDetails](/docs/schema/screen-scheme-details.md)
- [ScreenSchemeId](/docs/schema/screen-scheme-id.md)
- [ScreenSchemePayload](/docs/schema/screen-scheme-payload.md)
- [ScreenTypes](/docs/schema/screen-types.md)
- [ScreenWithTab](/docs/schema/screen-with-tab.md)
- [ScreenableField](/docs/schema/screenable-field.md)
- [ScreenableTab](/docs/schema/screenable-tab.md)
- [SearchAndReconcileRequestBean](/docs/schema/search-and-reconcile-request-bean.md)
- [SearchAndReconcileResults](/docs/schema/search-and-reconcile-results.md)
- [SearchAutoCompleteFilter](/docs/schema/search-auto-complete-filter.md)
- [SearchRequestBean](/docs/schema/search-request-bean.md)
- [SearchResults](/docs/schema/search-results.md)
- [SecurityLevel](/docs/schema/security-level.md)
- [SecurityLevelMember](/docs/schema/security-level-member.md)
- [SecurityLevelMemberPayload](/docs/schema/security-level-member-payload.md)
- [SecurityLevelPayload](/docs/schema/security-level-payload.md)
- [SecurityScheme](/docs/schema/security-scheme.md)
- [SecuritySchemeId](/docs/schema/security-scheme-id.md)
- [SecuritySchemeLevelBean](/docs/schema/security-scheme-level-bean.md)
- [SecuritySchemeLevelMemberBean](/docs/schema/security-scheme-level-member-bean.md)
- [SecuritySchemeMembersRequest](/docs/schema/security-scheme-members-request.md)
- [SecuritySchemePayload](/docs/schema/security-scheme-payload.md)
- [SecuritySchemeWithProjects](/docs/schema/security-scheme-with-projects.md)
- [SecuritySchemes](/docs/schema/security-schemes.md)
- [ServerInformation](/docs/schema/server-information.md)
- [ServiceManagementNavigationInfo](/docs/schema/service-management-navigation-info.md)
- [ServiceRegistry](/docs/schema/service-registry.md)
- [ServiceRegistryTier](/docs/schema/service-registry-tier.md)
- [SetDefaultLevelsRequest](/docs/schema/set-default-levels-request.md)
- [SetDefaultPriorityRequest](/docs/schema/set-default-priority-request.md)
- [SetDefaultResolutionRequest](/docs/schema/set-default-resolution-request.md)
- [SharePermission](/docs/schema/share-permission.md)
- [SharePermissionInputBean](/docs/schema/share-permission-input-bean.md)
- [SimpleApplicationPropertyBean](/docs/schema/simple-application-property-bean.md)
- [SimpleErrorCollection](/docs/schema/simple-error-collection.md)
- [SimpleLink](/docs/schema/simple-link.md)
- [SimpleListWrapperApplicationRole](/docs/schema/simple-list-wrapper-application-role.md)
- [SimpleListWrapperGroupName](/docs/schema/simple-list-wrapper-group-name.md)
- [SimpleUsage](/docs/schema/simple-usage.md)
- [SimplifiedHierarchyLevel](/docs/schema/simplified-hierarchy-level.md)
- [SimplifiedIssueTransition](/docs/schema/simplified-issue-transition.md)
- [SoftwareNavigationInfo](/docs/schema/software-navigation-info.md)
- [Status](/docs/schema/status.md)
- [StatusCategory](/docs/schema/status-category.md)
- [StatusCreate](/docs/schema/status-create.md)
- [StatusCreateRequest](/docs/schema/status-create-request.md)
- [StatusDetails](/docs/schema/status-details.md)
- [StatusLayoutUpdate](/docs/schema/status-layout-update.md)
- [StatusMapping](/docs/schema/status-mapping.md)
- [StatusMappingDTO](/docs/schema/status-mapping-dto.md)
- [StatusMetadata](/docs/schema/status-metadata.md)
- [StatusMigration](/docs/schema/status-migration.md)
- [StatusPayload](/docs/schema/status-payload.md)
- [StatusProjectIssueTypeUsage](/docs/schema/status-project-issue-type-usage.md)
- [StatusProjectIssueTypeUsageDTO](/docs/schema/status-project-issue-type-usage-dto.md)
- [StatusProjectIssueTypeUsagePage](/docs/schema/status-project-issue-type-usage-page.md)
- [StatusProjectUsage](/docs/schema/status-project-usage.md)
- [StatusProjectUsageDTO](/docs/schema/status-project-usage-dto.md)
- [StatusProjectUsagePage](/docs/schema/status-project-usage-page.md)
- [StatusScope](/docs/schema/status-scope.md)
- [StatusUpdate](/docs/schema/status-update.md)
- [StatusUpdateRequest](/docs/schema/status-update-request.md)
- [StatusWorkflowUsageDTO](/docs/schema/status-workflow-usage-dto.md)
- [StatusWorkflowUsagePage](/docs/schema/status-workflow-usage-page.md)
- [StatusWorkflowUsageWorkflow](/docs/schema/status-workflow-usage-workflow.md)
- [StatusesPerWorkflow](/docs/schema/statuses-per-workflow.md)
- [StreamingResponseBody](/docs/schema/streaming-response-body.md)
- [StringList](/docs/schema/string-list.md)
- [SubmittedBulkOperation](/docs/schema/submitted-bulk-operation.md)
- [SuggestedIssue](/docs/schema/suggested-issue.md)
- [SuggestedMappingsForPrioritiesRequestBean](/docs/schema/suggested-mappings-for-priorities-request-bean.md)
- [SuggestedMappingsForProjectsRequestBean](/docs/schema/suggested-mappings-for-projects-request-bean.md)
- [SuggestedMappingsRequestBean](/docs/schema/suggested-mappings-request-bean.md)
- [SwimlanePayload](/docs/schema/swimlane-payload.md)
- [SwimlanesPayload](/docs/schema/swimlanes-payload.md)
- [SystemAvatars](/docs/schema/system-avatars.md)

#### T
- [TabPayload](/docs/schema/tab-payload.md)
- [TargetClassification](/docs/schema/target-classification.md)
- [TargetMandatoryFields](/docs/schema/target-mandatory-fields.md)
- [TargetStatus](/docs/schema/target-status.md)
- [TargetToSourcesMapping](/docs/schema/target-to-sources-mapping.md)
- [TaskProgressBeanJsonNode](/docs/schema/task-progress-bean-json-node.md)
- [TaskProgressBeanObject](/docs/schema/task-progress-bean-object.md)
- [TaskProgressBeanRemoveOptionFromIssuesResult](/docs/schema/task-progress-bean-remove-option-from-issues-result.md)
- [TimeTrackingConfiguration](/docs/schema/time-tracking-configuration.md)
- [TimeTrackingDetails](/docs/schema/time-tracking-details.md)
- [TimeTrackingProvider](/docs/schema/time-tracking-provider.md)
- [ToLayoutPayload](/docs/schema/to-layout-payload.md)
- [Transition](/docs/schema/transition.md)
- [TransitionPayload](/docs/schema/transition-payload.md)
- [TransitionScreenDetails](/docs/schema/transition-screen-details.md)
- [TransitionUpdateDTO](/docs/schema/transition-update-dto.md)
- [Transitions](/docs/schema/transitions.md)

#### U
- [UiModificationContextDetails](/docs/schema/ui-modification-context-details.md)
- [UiModificationDetails](/docs/schema/ui-modification-details.md)
- [UiModificationIdentifiers](/docs/schema/ui-modification-identifiers.md)
- [UnrestrictedUserEmail](/docs/schema/unrestricted-user-email.md)
- [UpdateCustomFieldDetails](/docs/schema/update-custom-field-details.md)
- [UpdateDefaultProjectClassificationBean](/docs/schema/update-default-project-classification-bean.md)
- [UpdateDefaultScreenScheme](/docs/schema/update-default-screen-scheme.md)
- [UpdateFieldConfigurationSchemeDetails](/docs/schema/update-field-configuration-scheme-details.md)
- [UpdateIssueSecurityLevelDetails](/docs/schema/update-issue-security-level-details.md)
- [UpdateIssueSecuritySchemeRequestBean](/docs/schema/update-issue-security-scheme-request-bean.md)
- [UpdateNotificationSchemeDetails](/docs/schema/update-notification-scheme-details.md)
- [UpdatePrioritiesInSchemeRequestBean](/docs/schema/update-priorities-in-scheme-request-bean.md)
- [UpdatePriorityDetails](/docs/schema/update-priority-details.md)
- [UpdatePrioritySchemeRequestBean](/docs/schema/update-priority-scheme-request-bean.md)
- [UpdatePrioritySchemeResponseBean](/docs/schema/update-priority-scheme-response-bean.md)
- [UpdateProjectDetails](/docs/schema/update-project-details.md)
- [UpdateProjectsInSchemeRequestBean](/docs/schema/update-projects-in-scheme-request-bean.md)
- [UpdateResolutionDetails](/docs/schema/update-resolution-details.md)
- [UpdateScreenDetails](/docs/schema/update-screen-details.md)
- [UpdateScreenSchemeDetails](/docs/schema/update-screen-scheme-details.md)
- [UpdateScreenTypes](/docs/schema/update-screen-types.md)
- [UpdateUiModificationDetails](/docs/schema/update-ui-modification-details.md)
- [UpdateUserToGroupBean](/docs/schema/update-user-to-group-bean.md)
- [UpdatedProjectCategory](/docs/schema/updated-project-category.md)
- [User](/docs/schema/user.md)
- [UserBean](/docs/schema/user-bean.md)
- [UserBeanAvatarUrls](/docs/schema/user-bean-avatar-urls.md)
- [UserColumnRequestBody](/docs/schema/user-column-request-body.md)
- [UserContextVariable](/docs/schema/user-context-variable.md)
- [UserDetails](/docs/schema/user-details.md)
- [UserFilter](/docs/schema/user-filter.md)
- [UserKey](/docs/schema/user-key.md)
- [UserList](/docs/schema/user-list.md)
- [UserMigrationBean](/docs/schema/user-migration-bean.md)
- [UserNavPropertyJsonBean](/docs/schema/user-nav-property-json-bean.md)
- [UserPermission](/docs/schema/user-permission.md)
- [UserPickerUser](/docs/schema/user-picker-user.md)

#### V
- [ValidationOptionsForCreate](/docs/schema/validation-options-for-create.md)
- [ValidationOptionsForUpdate](/docs/schema/validation-options-for-update.md)
- [ValueOperand](/docs/schema/value-operand.md)
- [Version](/docs/schema/version.md)
- [VersionApprover](/docs/schema/version-approver.md)
- [VersionIssueCounts](/docs/schema/version-issue-counts.md)
- [VersionIssuesStatus](/docs/schema/version-issues-status.md)
- [VersionMoveBean](/docs/schema/version-move-bean.md)
- [VersionRelatedWork](/docs/schema/version-related-work.md)
- [VersionUnresolvedIssuesCount](/docs/schema/version-unresolved-issues-count.md)
- [VersionUsageInCustomField](/docs/schema/version-usage-in-custom-field.md)
- [Visibility](/docs/schema/visibility.md)
- [Votes](/docs/schema/votes.md)

#### W
- [WarningCollection](/docs/schema/warning-collection.md)
- [Watchers](/docs/schema/watchers.md)
- [Webhook](/docs/schema/webhook.md)
- [WebhookDetails](/docs/schema/webhook-details.md)
- [WebhookRegistrationDetails](/docs/schema/webhook-registration-details.md)
- [WebhooksExpirationDate](/docs/schema/webhooks-expiration-date.md)
- [WorkManagementNavigationInfo](/docs/schema/work-management-navigation-info.md)
- [Workflow](/docs/schema/workflow.md)
- [WorkflowAssociationStatusMapping](/docs/schema/workflow-association-status-mapping.md)
- [WorkflowCapabilities](/docs/schema/workflow-capabilities.md)
- [WorkflowCapabilityPayload](/docs/schema/workflow-capability-payload.md)
- [WorkflowCompoundCondition](/docs/schema/workflow-compound-condition.md)
- [WorkflowCondition](/docs/schema/workflow-condition.md)
- [WorkflowCreate](/docs/schema/workflow-create.md)
- [WorkflowCreateRequest](/docs/schema/workflow-create-request.md)
- [WorkflowCreateResponse](/docs/schema/workflow-create-response.md)
- [WorkflowCreateValidateRequest](/docs/schema/workflow-create-validate-request.md)
- [WorkflowElementReference](/docs/schema/workflow-element-reference.md)
- [WorkflowIDs](/docs/schema/workflow-i-ds.md)
- [WorkflowId](/docs/schema/workflow-id.md)
- [WorkflowLayout](/docs/schema/workflow-layout.md)
- [WorkflowMetadataAndIssueTypeRestModel](/docs/schema/workflow-metadata-and-issue-type-rest-model.md)
- [WorkflowMetadataRestModel](/docs/schema/workflow-metadata-rest-model.md)
- [WorkflowOperations](/docs/schema/workflow-operations.md)
- [WorkflowPayload](/docs/schema/workflow-payload.md)
- [WorkflowProjectIssueTypeUsage](/docs/schema/workflow-project-issue-type-usage.md)
- [WorkflowProjectIssueTypeUsageDTO](/docs/schema/workflow-project-issue-type-usage-dto.md)
- [WorkflowProjectIssueTypeUsagePage](/docs/schema/workflow-project-issue-type-usage-page.md)
- [WorkflowProjectUsageDTO](/docs/schema/workflow-project-usage-dto.md)
- [WorkflowReadRequest](/docs/schema/workflow-read-request.md)
- [WorkflowReadResponse](/docs/schema/workflow-read-response.md)
- [WorkflowReferenceStatus](/docs/schema/workflow-reference-status.md)
- [WorkflowRuleConfiguration](/docs/schema/workflow-rule-configuration.md)
- [WorkflowRules](/docs/schema/workflow-rules.md)
- [WorkflowRulesSearch](/docs/schema/workflow-rules-search.md)
- [WorkflowRulesSearchDetails](/docs/schema/workflow-rules-search-details.md)
- [WorkflowScheme](/docs/schema/workflow-scheme.md)
- [WorkflowSchemeAssociation](/docs/schema/workflow-scheme-association.md)
- [WorkflowSchemeAssociations](/docs/schema/workflow-scheme-associations.md)
- [WorkflowSchemeIdName](/docs/schema/workflow-scheme-id-name.md)
- [WorkflowSchemePayload](/docs/schema/workflow-scheme-payload.md)
- [WorkflowSchemeProjectAssociation](/docs/schema/workflow-scheme-project-association.md)
- [WorkflowSchemeProjectUsageDTO](/docs/schema/workflow-scheme-project-usage-dto.md)
- [WorkflowSchemeReadRequest](/docs/schema/workflow-scheme-read-request.md)
- [WorkflowSchemeReadResponse](/docs/schema/workflow-scheme-read-response.md)
- [WorkflowSchemeUpdateRequest](/docs/schema/workflow-scheme-update-request.md)
- [WorkflowSchemeUpdateRequiredMappingsRequest](/docs/schema/workflow-scheme-update-required-mappings-request.md)
- [WorkflowSchemeUpdateRequiredMappingsResponse](/docs/schema/workflow-scheme-update-required-mappings-response.md)
- [WorkflowSchemeUsage](/docs/schema/workflow-scheme-usage.md)
- [WorkflowSchemeUsageDTO](/docs/schema/workflow-scheme-usage-dto.md)
- [WorkflowSchemeUsagePage](/docs/schema/workflow-scheme-usage-page.md)
- [WorkflowScope](/docs/schema/workflow-scope.md)
- [WorkflowSearchResponse](/docs/schema/workflow-search-response.md)
- [WorkflowSimpleCondition](/docs/schema/workflow-simple-condition.md)
- [WorkflowStatus](/docs/schema/workflow-status.md)
- [WorkflowStatusLayout](/docs/schema/workflow-status-layout.md)
- [WorkflowStatusLayoutPayload](/docs/schema/workflow-status-layout-payload.md)
- [WorkflowStatusPayload](/docs/schema/workflow-status-payload.md)
- [WorkflowStatusUpdate](/docs/schema/workflow-status-update.md)
- [WorkflowTransition](/docs/schema/workflow-transition.md)
- [WorkflowTransitionLinks](/docs/schema/workflow-transition-links.md)
- [WorkflowTransitionProperty](/docs/schema/workflow-transition-property.md)
- [WorkflowTransitionRule](/docs/schema/workflow-transition-rule.md)
- [WorkflowTransitionRules](/docs/schema/workflow-transition-rules.md)
- [WorkflowTransitionRulesDetails](/docs/schema/workflow-transition-rules-details.md)
- [WorkflowTransitionRulesUpdate](/docs/schema/workflow-transition-rules-update.md)
- [WorkflowTransitionRulesUpdateErrorDetails](/docs/schema/workflow-transition-rules-update-error-details.md)
- [WorkflowTransitionRulesUpdateErrors](/docs/schema/workflow-transition-rules-update-errors.md)
- [WorkflowTransitions](/docs/schema/workflow-transitions.md)
- [WorkflowTrigger](/docs/schema/workflow-trigger.md)
- [WorkflowUpdate](/docs/schema/workflow-update.md)
- [WorkflowUpdateRequest](/docs/schema/workflow-update-request.md)
- [WorkflowUpdateResponse](/docs/schema/workflow-update-response.md)
- [WorkflowUpdateValidateRequestBean](/docs/schema/workflow-update-validate-request-bean.md)
- [WorkflowUsages](/docs/schema/workflow-usages.md)
- [WorkflowValidationError](/docs/schema/workflow-validation-error.md)
- [WorkflowValidationErrorList](/docs/schema/workflow-validation-error-list.md)
- [WorkflowsWithTransitionRulesDetails](/docs/schema/workflows-with-transition-rules-details.md)
- [WorkingDaysConfig](/docs/schema/working-days-config.md)
- [Worklog](/docs/schema/worklog.md)
- [WorklogIdsRequestBean](/docs/schema/worklog-ids-request-bean.md)
- [WorklogsMoveRequestBean](/docs/schema/worklogs-move-request-bean.md)
- [WorkspaceDataPolicy](/docs/schema/workspace-data-policy.md)

