# Dashboard Gadget

Details of a gadget.

Source: [`Jira\Client\Schema\DashboardGadget`](src/Schema/DashboardGadget.php)

| Property | Type | Description |
| --- | --- | --- |
| `color` | `string` | The color of the gadget. Should be one of `blue`, `red`, `yellow`, `green`, `cyan`, `purple`, `gray`, or `white`. |
| `id` | `int` | The ID of the gadget instance. |
| `position` | `DashboardGadgetPosition` | The position of the gadget. |
| `title` | `string` | The title of the gadget. |
| `moduleKey` | `string` | The module key of the gadget type. |
| `uri` | `string` | The URI of the gadget type. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Dashboards](/docs/operations/dashboards.md) | [addGadget](/docs/operations/dashboards.md#add-gadget) |

### Schema

| Group | Operation |
| --- | --- |
| [DashboardGadgetResponse](/docs/schema/dashboard-gadget-response.md) |
