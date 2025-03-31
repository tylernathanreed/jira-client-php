# Issue Field Option Scope Bean


Source: [`Jira\Client\Schema\IssueFieldOptionScopeBean`](/src/Schema/IssueFieldOptionScopeBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `global` | `GlobalScopeBean` | Defines the behavior of the option within the global context. If this property is set, even if set to an empty object, then the option is available in all projects. |
| `projects` | `?list<int>` | DEPRECATED |
| `projects2` | [`?list<ProjectScopeBean>`](/docs/schemas/project-scope-bean.md) | Defines the projects in which the option is available and the behavior of the option within each project. Specify one object per project. The behavior of the option in a project context overrides the behavior in the global context. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [IssueFieldOptionConfiguration](/docs/schema/issue-field-option-configuration.md) |
