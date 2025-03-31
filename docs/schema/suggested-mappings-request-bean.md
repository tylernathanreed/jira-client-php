# Suggested Mappings Request Bean

Details of changes to a priority scheme that require suggested priority mappings.

Source: [`Jira\Client\Schema\SuggestedMappingsRequestBean`](/src/Schema/SuggestedMappingsRequestBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `maxResults` | `int` | The maximum number of results that could be on the page. |
| `priorities` | [`SuggestedMappingsForPrioritiesRequestBean`](/docs/schema/suggested-mappings-for-priorities-request-bean.md) | The priority changes in the scheme. |
| `projects` | [`SuggestedMappingsForProjectsRequestBean`](/docs/schema/suggested-mappings-for-projects-request-bean.md) | The project changes in the scheme. |
| `schemeId` | `int` | The id of the priority scheme. |
| `startAt` | `int` | The index of the first item returned on the page. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [PrioritySchemes](/docs/operations/priority-schemes.md) | [suggestedPrioritiesForMappings](/docs/operations/priority-schemes.md#suggested-priorities-for-mappings) |

### Schema

*None*
