# Associate Security Scheme With Project Details

Issue security scheme, project, and remapping details.

Source: [`Jira\Client\Schema\AssociateSecuritySchemeWithProjectDetails`](src/Schema/AssociateSecuritySchemeWithProjectDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `projectId` | `string` | The ID of the project. |
| `schemeId` | `string` | The ID of the issue security scheme. Providing null will clear the association with the issue security scheme. |
| `oldToNewSecurityLevelMappings` | `array` | The list of scheme levels which should be remapped to new levels of the issue security scheme. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueSecuritySchemes](/docs/operations/issue-security-schemes.md) | [associateSchemesToProjects](/docs/operations/issue-security-schemes.md#associate-schemes-to-projects) |

### Schema

*None*
