# Project Scope Bean


Source: [`Jira\Client\Schema\ProjectScopeBean`](/src/Schema/ProjectScopeBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `attributes` | `array` | Defines the behavior of the option in the project.If notSelectable is set, the option cannot be set as the field's value. This is useful for archiving an option that has previously been selected but shouldn't be used anymore.If defaultValue is set, the option is selected by default. |
| `id` | `int` | The ID of the project that the option's behavior applies to. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [IssueFieldOptionScopeBean](/docs/schema/issue-field-option-scope-bean.md) |
