<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A list of issue IDs and the value to update a custom field to. */
final readonly class CustomFieldValueUpdate extends Dto
{
    public function __construct(
        /**
         * The list of issue IDs.
         * 
         * @var list<integer>
         */
        public array $issueIds,

        /**
         * The value for the custom field.
         * The value must be compatible with the "custom field type" as follows:
         * 
         *  - `string` the value must be a string
         *  - `number` the value must be a number
         *  - `datetime` the value must be a string that represents a date in the ISO format or the simplified extended ISO format.
         * For example, `"2023-01-18T12:00:00-03:00"` or `"2023-01-18T12:00:00.000Z"`.
         * However, the milliseconds part is ignored
         *  - `user` the value must be an object that contains the `accountId` field
         *  - `group` the value must be an object that contains the group `name` or `groupId` field.
         * Because group names can change, we recommend using `groupId`
         * 
         * A list of appropriate values must be provided if the field is of the `list` "collection type".
         * 
         * @link https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field/#data-types
         * @link https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field/#collection-types
         */
        public mixed $value,
    ) {
    }

}
