# Old To New Security Level Mappings Bean


Source: [`Jira\Client\Schema\OldToNewSecurityLevelMappingsBean`](src/Schema/OldToNewSecurityLevelMappingsBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `newLevelId` | `string` | The new issue security level ID. Providing null will clear the assigned old level from issues. |
| `oldLevelId` | `string` | The old issue security level ID. Providing null will remap all issues without any assigned levels. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [AssociateSecuritySchemeWithProjectDetails](/docs/schema/associate-security-scheme-with-project-details.md) |
