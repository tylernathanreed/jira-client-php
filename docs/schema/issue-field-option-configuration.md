# Issue Field Option Configuration

Details of the projects the option is available in.

Source: [`Jira\Client\Schema\IssueFieldOptionConfiguration`](/src/Schema/IssueFieldOptionConfiguration.php)

| Property | Type | Description |
| --- | --- | --- |
| `attributes` | `?list<string>` | DEPRECATED |
| `scope` | `IssueFieldOptionScopeBean` | Defines the projects that the option is available in. If the scope is not defined, then the option is available in all projects. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [IssueFieldOption](/docs/schema/issue-field-option.md) |
| [IssueFieldOptionCreateBean](/docs/schema/issue-field-option-create-bean.md) |
