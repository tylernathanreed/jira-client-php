# Dashboard Gadget Settings

Details of the settings for a dashboard gadget.

Source: [`Jira\Client\Schema\DashboardGadgetSettings`](/src/Schema/DashboardGadgetSettings.php)

| Property | Type | Description |
| --- | --- | --- |
| `color` | `` | The color of the gadget. Should be one of `blue`, `red`, `yellow`, `green`, `cyan`, `purple`, `gray`, or `white`. |
| `ignoreUriAndModuleKeyValidation` | `` | Whether to ignore the validation of module key and URI. For example, when a gadget is created that is a part of an application that isn't installed. |
| `moduleKey` | `` | The module key of the gadget type. Can't be provided with `uri`. |
| `position` | `` | The position of the gadget. When the gadget is placed into the position, other gadgets in the same column are moved down to accommodate it. |
| `title` | `` | The title of the gadget. |
| `uri` | `` | The URI of the gadget type. Can't be provided with `moduleKey`. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Dashboards](/docs/operations/dashboards.md) | [addGadget](/docs/operations/dashboards.md#add-gadget) |

### Schema

*None*
