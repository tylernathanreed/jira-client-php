# Security Level Member Payload

The payload for creating a security level member.
See https://support.atlassian.com/jira-cloud-administration/docs/configure-issue-security-schemes/

Source: [`Jira\Client\Schema\SecurityLevelMemberPayload`](/src/Schema/SecurityLevelMemberPayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `parameter` | `string` | Defines the value associated with the type. For reporter this would be \{"null"\}; for users this would be the names of specific users); for group this would be group names like \{"administrators", "jira-administrators", "jira-users"\} |
| `type` | `'group'\|'reporter'\|'users'\|null` | The type of the security level member |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [SecurityLevelPayload](/docs/schema/security-level-payload.md) |
