# Issue Field Option Configuration

Details of the projects the option is available in.

Source: [`Jira\Client\Schema\IssueFieldOptionConfiguration`](/src/Schema/IssueFieldOptionConfiguration.php)

| Property | Type | Description |
| --- | --- | --- |
| `attributes` | `array` | DEPRECATED |
| `scope` | `IssueFieldOptionScopeBean` | Defines the projects that the option is available in. If the scope is not defined, then the option is available in all projects. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [IssueFieldOption](/docs/schema/issue-field-option.md) |
| [IssueFieldOptionCreateBean](/docs/schema/issue-field-option-create-bean.md) |
