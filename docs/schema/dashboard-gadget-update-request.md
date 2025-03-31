# Dashboard Gadget Update Request

The details of the gadget to update.

Source: [`Jira\Client\Schema\DashboardGadgetUpdateRequest`](/src/Schema/DashboardGadgetUpdateRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `color` | `string` | The color of the gadget. Should be one of `blue`, `red`, `yellow`, `green`, `cyan`, `purple`, `gray`, or `white`. |
| `position` | [`DashboardGadgetPosition`](/docs/schema/dashboard-gadget-position.md) | The position of the gadget. |
| `title` | `string` | The title of the gadget. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Dashboards](/docs/operations/dashboards.md) | [updateGadget](/docs/operations/dashboards.md#update-gadget) |

### Schema

*None*
