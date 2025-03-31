# Version

Details about a project version.

Source: [`Jira\Client\Schema\Version`](/src/Schema/Version.php)

| Property | Type | Description |
| --- | --- | --- |
| `approvers` | `array` | If the expand option `approvers` is used, returns a list containing the approvers for this version. |
| `archived` | `bool` | Indicates that the version is archived. Optional when creating or updating a version. |
| `description` | `string` | The description of the version. Optional when creating or updating a version. The maximum size is 16,384 bytes. |
| `driver` | `string` | If the expand option `driver` is used, returns the Atlassian account ID of the driver. |
| `expand` | `string` | Use [expand](em>#expansion) to include additional information about version in the response. This parameter accepts a comma-separated list. Expand options include:

 *  `operations` Returns the list of operations available for this version.
 *  `issuesstatus` Returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property contains a count of issues with a status other than *to do*, *in progress*, and *done*.
 *  `driver` Returns the Atlassian account ID of the version driver.
 *  `approvers` Returns a list containing approvers for this version.

Optional for create and update. |
| `id` | `string` | The ID of the version. |
| `issuesStatusForFixVersion` | `VersionIssuesStatus` | If the expand option `issuesstatus` is used, returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property contains a count of issues with a status other than *to do*, *in progress*, and *done*. |
| `moveUnfixedIssuesTo` | `string` | The URL of the self link to the version to which all unfixed issues are moved when a version is released. Not applicable when creating a version. Optional when updating a version. |
| `name` | `string` | The unique name of the version. Required when creating a version. Optional when updating a version. The maximum length is 255 characters. |
| `operations` | `array` | If the expand option `operations` is used, returns the list of operations available for this version. |
| `overdue` | `bool` | Indicates that the version is overdue. |
| `project` | `string` | Deprecated. Use `projectId`. |
| `projectId` | `int` | The ID of the project to which this version is attached. Required when creating a version. Not applicable when updating a version. |
| `releaseDate` | `string` | The release date of the version. Expressed in ISO 8601 format (yyyy-mm-dd). Optional when creating or updating a version. |
| `released` | `bool` | Indicates that the version is released. If the version is released a request to release again is ignored. Not applicable when creating a version. Optional when updating a version. |
| `self` | `string` | The URL of the version. |
| `startDate` | `string` | The start date of the version. Expressed in ISO 8601 format (yyyy-mm-dd). Optional when creating or updating a version. |
| `userReleaseDate` | `string` | The date on which work on this version is expected to finish, expressed in the instance's *Day/Month/Year Format* date format. |
| `userStartDate` | `string` | The date on which work on this version is expected to start, expressed in the instance's *Day/Month/Year Format* date format. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [ProjectVersions](/docs/operations/project-versions.md) | [getProjectVersions](/docs/operations/project-versions.md#get-project-versions) |
| [ProjectVersions](/docs/operations/project-versions.md) | [createVersion](/docs/operations/project-versions.md#create-version) |
| [ProjectVersions](/docs/operations/project-versions.md) | [getVersion](/docs/operations/project-versions.md#get-version) |
| [ProjectVersions](/docs/operations/project-versions.md) | [updateVersion](/docs/operations/project-versions.md#update-version) |
| [ProjectVersions](/docs/operations/project-versions.md) | [moveVersion](/docs/operations/project-versions.md#move-version) |

### Schema

| Group | Operation |
| --- | --- |
| [LegacyJackson1ListVersion](/docs/schema/legacy-jackson1-list-version.md) |
| [PageBeanVersion](/docs/schema/page-bean-version.md) |
| [Project](/docs/schema/project.md) |
