# Project Templates

Source: [`Jira\Client\Operations\ProjectTemplates`](/src/Operations/ProjectTemplates.php)

## Operations

- [Create Custom Project](#createProjectWithCustomTemplate)

## Create Custom Project
<a name="createProjectWithCustomTemplate"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-templates/#api-rest-api-3-project-template-post

Creates a project based on a custom template provided in the request

The request body should contain the project details and the capabilities that comprise the project:

 - `details` \- represents the project details settings
 - `template` \- represents a list of capabilities responsible for creating specific parts of a project

A capability is defined as a unit of configuration for the project you want to create

This operation is:

 - "asynchronous".
Follow the `Location` link in the response header to determine the status of the task and use "Get task" to obtain subsequent updates

***Note: This API is only supported for Jira Enterprise edition.***


### Request

#### Request Body

Source: [`Jira\Client\Schema\ProjectCustomTemplateCreateRequestDTO`](/docs/schema/project-custom-template-create-request-dto.md)

Request to create a project using a custom template

| Property | Type | Description |
| --- | --- | --- |
| `details` | [`CustomTemplatesProjectDetails`](/docs/schema/custom-templates-project-details.md) |  |
| `template` | [`CustomTemplateRequestDTO`](/docs/schema/custom-template-request-dto.md) |  |

#### Response

`true`
