# Security Scheme Payload

The payload for creating a security scheme.
See https://support.atlassian.com/jira-cloud-administration/docs/configure-issue-security-schemes/

Source: [`Jira\Client\Schema\SecuritySchemePayload`](/src/Schema/SecuritySchemePayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the security scheme |
| `name` | `string` | The name of the security scheme |
| `pcri` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |
| `securityLevels` | [`?list<SecurityLevelPayload>`](/docs/schema/security-level-payload.md) | The security levels for the security scheme |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [CustomTemplateRequestDTO](/docs/schema/custom-template-request-dto.md) |
