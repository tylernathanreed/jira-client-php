# Issue Type Screen Scheme Mapping

The IDs of the screen schemes for the issue type IDs.

Source: [`Jira\Client\Schema\IssueTypeScreenSchemeMapping`](/src/Schema/IssueTypeScreenSchemeMapping.php)

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeId` | `string` | The ID of the issue type or *default*. Only issue types used in classic projects are accepted. An entry for *default* must be provided and defines the mapping for all issue types without a screen scheme. |
| `screenSchemeId` | `string` | The ID of the screen scheme. Only screen schemes used in classic projects are accepted. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [IssueTypeScreenSchemeDetails](/docs/schema/issue-type-screen-scheme-details.md) |
| [IssueTypeScreenSchemeMappingDetails](/docs/schema/issue-type-screen-scheme-mapping-details.md) |
