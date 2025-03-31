# Issue Type Screen Scheme Details

The details of an issue type screen scheme.

Source: [`Jira\Client\Schema\IssueTypeScreenSchemeDetails`](/src/Schema/IssueTypeScreenSchemeDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeMappings` | [`list<IssueTypeScreenSchemeMapping>`](/docs/schemas/issue-type-screen-scheme-mapping.md) | The IDs of the screen schemes for the issue type IDs and *default*. A *default* entry is required to create an issue type screen scheme, it defines the mapping for all issue types without a screen scheme. |
| `name` | `string` | The name of the issue type screen scheme. The name must be unique. The maximum length is 255 characters. |
| `description` | `string` | The description of the issue type screen scheme. The maximum length is 255 characters. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueTypeScreenSchemes](/docs/operations/issue-type-screen-schemes.md) | [createIssueTypeScreenScheme](/docs/operations/issue-type-screen-schemes.md#create-issue-type-screen-scheme) |

### Schema

*None*
