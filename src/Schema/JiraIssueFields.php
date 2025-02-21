<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraIssueFieldsDoc
final readonly class JiraIssueFields extends Dto
{
    public function __construct(
        /**
         * Add or clear a cascading select field:
         * 
         *  - To add, specify `optionId` for both parent and child
         *  - To clear the child, set its `optionId` to null
         *  - To clear both, set the parent's `optionId` to null.
         * 
         * @var ?list<JiraCascadingSelectField>
         */
        public ?array $cascadingSelectFields = null,

        /**
         * Add or clear a number field:
         * 
         *  - To add, specify a numeric `value`
         *  - To clear, set `value` to `null`.
         * 
         * @var ?list<JiraNumberField>
         */
        public ?array $clearableNumberFields = null,

        /**
         * Add or clear a color field:
         * 
         *  - To add, specify the color `name`.
         * Available colors are: `purple`, `blue`, `green`, `teal`, `yellow`, `orange`, `grey`, `dark purple`, `dark blue`, `dark green`, `dark teal`, `dark yellow`, `dark orange`, `dark grey`
         *  - To clear, set the color `name` to an empty string.
         * 
         * @var ?list<JiraColorField>
         */
        public ?array $colorFields = null,

        /**
         * Add or clear a date picker field:
         * 
         *  - To add, specify the date in `d/mmm/yy` format or ISO format `dd-mm-yyyy`
         *  - To clear, set `formattedDate` to an empty string.
         * 
         * @var ?list<JiraDateField>
         */
        public ?array $datePickerFields = null,

        /**
         * Add or clear the planned start date and time:
         * 
         *  - To add, specify the date and time in ISO format for `formattedDateTime`
         *  - To clear, provide an empty string for `formattedDateTime`.
         * 
         * @var ?list<JiraDateTimeField>
         */
        public ?array $dateTimePickerFields = null,

        /** Set the issue type field by providing an `issueTypeId`. */
        public ?JiraIssueTypeField $issueType = null,

        /**
         * Edit a labels field:
         * 
         *  - Options include `ADD`, `REPLACE`, `REMOVE`, or `REMOVE_ALL` for bulk edits
         *  - To clear labels, use the `REMOVE_ALL` option with an empty `labels` array.
         * 
         * @var ?list<JiraLabelsField>
         */
        public ?array $labelsFields = null,

        /**
         * Add or clear a multi-group picker field:
         * 
         *  - To add groups, provide an array of groups with `groupName`s
         *  - To clear all groups, use an empty `groups` array.
         * 
         * @var ?list<JiraMultipleGroupPickerField>
         */
        public ?array $multipleGroupPickerFields = null,

        /**
         * Assign or unassign multiple users to/from a field:
         * 
         *  - To assign, provide an array of user `accountId`s
         *  - To clear, set `users` to `null`.
         * 
         * @var ?list<JiraMultipleSelectUserPickerField>
         */
        public ?array $multipleSelectClearableUserPickerFields = null,

        /**
         * Add or clear a multi-select field:
         * 
         *  - To add, provide an array of options with `optionId`s
         *  - To clear, use an empty `options` array.
         * 
         * @var ?list<JiraMultipleSelectField>
         */
        public ?array $multipleSelectFields = null,

        /**
         * Edit a multi-version picker field like Fix Versions/Affects Versions:
         * 
         *  - Options include `ADD`, `REPLACE`, `REMOVE`, or `REMOVE_ALL` for bulk edits
         *  - To clear the field, use the `REMOVE_ALL` option with an empty `versions` array.
         * 
         * @var ?list<JiraMultipleVersionPickerField>
         */
        public ?array $multipleVersionPickerFields = null,

        /**
         * Edit a multi select components field:
         * 
         *  - Options include `ADD`, `REPLACE`, `REMOVE`, or `REMOVE_ALL` for bulk edits
         *  - To clear, use the `REMOVE_ALL` option with an empty `components` array.
         */
        public ?JiraMultiSelectComponentField $multiselectComponents = null,

        /** Edit the original estimate field. */
        public ?JiraDurationField $originalEstimateField = null,

        /** Set the priority of an issue by specifying a `priorityId`. */
        public ?JiraPriorityField $priority = null,

        /**
         * Add or clear a rich text field:
         * 
         *  - To add, provide `adfValue`.
         * Note that rich text fields only support ADF values
         *  - To clear, use an empty `richText` object
         * 
         * For ADF format details, refer to: "Atlassian Document Format".
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/apis/document/structure
         * 
         * @var ?list<JiraRichTextField>
         */
        public ?array $richTextFields = null,

        /**
         * Add or clear a single group picker field:
         * 
         *  - To add, specify the group with `groupName`
         *  - To clear, set `groupName` to an empty string.
         * 
         * @var ?list<JiraSingleGroupPickerField>
         */
        public ?array $singleGroupPickerFields = null,

        /**
         * Add or clear a single line text field:
         * 
         *  - To add, provide the `text` value
         *  - To clear, set `text` to an empty string.
         * 
         * @var ?list<JiraSingleLineTextField>
         */
        public ?array $singleLineTextFields = null,

        /**
         * Edit assignment for single select user picker fields like Assignee/Reporter:
         * 
         *  - To assign an issue, specify the user's `accountId`
         *  - To unassign an issue, set `user` to `null`
         *  - For automatic assignment, set `accountId` to `-1`.
         * 
         * @var ?list<JiraSingleSelectUserPickerField>
         */
        public ?array $singleSelectClearableUserPickerFields = null,

        /**
         * Add or clear a single select field:
         * 
         *  - To add, specify the option with an `optionId`
         *  - To clear, pass an option with `optionId` as `-1`.
         * 
         * @var ?list<JiraSingleSelectField>
         */
        public ?array $singleSelectFields = null,

        /**
         * Add or clear a single version picker field:
         * 
         *  - To add, specify the version with a `versionId`
         *  - To clear, set `versionId` to `-1`.
         * 
         * @var ?list<JiraSingleVersionPickerField>
         */
        public ?array $singleVersionPickerFields = null,

        /** Edit the time tracking field. */
        public ?JiraTimeTrackingField $timeTrackingField = null,

        /**
         * Add or clear a URL field:
         * 
         *  - To add, provide the `url` with the desired URL value
         *  - To clear, set `url` to an empty string.
         * 
         * @var ?list<JiraUrlField>
         */
        public ?array $urlFields = null,
    ) {
    }
}
