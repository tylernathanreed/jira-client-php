# Create Custom Field Context

The details of a created custom field context.

Source: [`Jira\Client\Schema\CreateCustomFieldContext`](/src/Schema/CreateCustomFieldContext.php)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the context. |
| `description` | `string` | The description of the context. |
| `id` | `string` | The ID of the context. |
| `issueTypeIds` | `?list<string>` | The list of issue types IDs for the context. If the list is empty, the context refers to all issue types. |
| `projectIds` | `?list<string>` | The list of project IDs associated with the context. If the list is empty, the context is global. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueCustomFieldContexts](/docs/operations/issue-custom-field-contexts.md) | [createCustomFieldContext](/docs/operations/issue-custom-field-contexts.md#create-custom-field-context) |

### Schema

*None*
