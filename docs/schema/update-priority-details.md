# Update Priority Details

Details of an issue priority.

Source: [`Jira\Client\Schema\UpdatePriorityDetails`](/src/Schema/UpdatePriorityDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `avatarId` | `int` | The ID for the avatar for the priority. This parameter is nullable and both iconUrl and avatarId cannot be defined. |
| `description` | `string` | The description of the priority. |
| `iconUrl` | `'/images/icons/priorities/blocker.png'\|`<br/>`'/images/icons/priorities/critical.png'\|`<br/>`'/images/icons/priorities/high.png'\|`<br/>`'/images/icons/priorities/highest.png'\|`<br/>`'/images/icons/priorities/low.png'\|`<br/>`'/images/icons/priorities/lowest.png'\|`<br/>`'/images/icons/priorities/major.png'\|`<br/>`'/images/icons/priorities/medium.png'\|`<br/>`'/images/icons/priorities/minor.png'\|`<br/>`'/images/icons/priorities/trivial.png'\|`<br/>`'/images/icons/priorities/blocker_new.png'\|`<br/>`'/images/icons/priorities/critical_new.png'\|`<br/>`'/images/icons/priorities/high_new.png'\|`<br/>`'/images/icons/priorities/highest_new.png'\|`<br/>`'/images/icons/priorities/low_new.png'\|`<br/>`'/images/icons/priorities/lowest_new.png'\|`<br/>`'/images/icons/priorities/major_new.png'\|`<br/>`'/images/icons/priorities/medium_new.png'\|`<br/>`'/images/icons/priorities/minor_new.png'\|`<br/>`'/images/icons/priorities/trivial_new.png'\|`<br/>`null` | The URL of an icon for the priority. Accepted protocols are HTTP and HTTPS. Built in icons can also be used. Both iconUrl and avatarId cannot be defined. |
| `name` | `string` | The name of the priority. Must be unique. |
| `statusColor` | `string` | The status color of the priority in 3-digit or 6-digit hexadecimal format. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssuePriorities](/docs/operations/issue-priorities.md) | [updatePriority](/docs/operations/issue-priorities.md#update-priority) |

### Schema

*None*
