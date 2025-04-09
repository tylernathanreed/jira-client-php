# Security Level Payload

The payload for creating a security level.
See https://support.atlassian.com/jira-cloud-administration/docs/configure-issue-security-schemes/

Source: [`Jira\Client\Schema\SecurityLevelPayload`](/src/Schema/SecurityLevelPayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the security level |
| `isDefault` | `bool` | Whether the security level is default for the security scheme |
| `name` | `string` | The name of the security level |
| `securityLevelMembers` | [`?list<SecurityLevelMemberPayload>`](/docs/schema/security-level-member-payload.md) | The members of the security level |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [SecuritySchemePayload](/docs/schema/security-scheme-payload.md) |
