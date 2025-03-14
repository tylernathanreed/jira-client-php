<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of a custom field. */
final readonly class UpdateCustomFieldDetails extends Dto
{
    public function __construct(
        /**
         * The description of the custom field.
         * The maximum length is 40000 characters.
         */
        public ?string $description = null,

        /**
         * The name of the custom field.
         * It doesn't have to be unique.
         * The maximum length is 255 characters.
         */
        public ?string $name = null,

        /**
         * The searcher that defines the way the field is searched in Jira.
         * It can be set to `null`, otherwise you must specify the valid searcher for the field type, as listed below (abbreviated values shown):
         * 
         *  - `cascadingselect`: `cascadingselectsearcher`
         *  - `datepicker`: `daterange`
         *  - `datetime`: `datetimerange`
         *  - `float`: `exactnumber` or `numberrange`
         *  - `grouppicker`: `grouppickersearcher`
         *  - `importid`: `exactnumber` or `numberrange`
         *  - `labels`: `labelsearcher`
         *  - `multicheckboxes`: `multiselectsearcher`
         *  - `multigrouppicker`: `multiselectsearcher`
         *  - `multiselect`: `multiselectsearcher`
         *  - `multiuserpicker`: `userpickergroupsearcher`
         *  - `multiversion`: `versionsearcher`
         *  - `project`: `projectsearcher`
         *  - `radiobuttons`: `multiselectsearcher`
         *  - `readonlyfield`: `textsearcher`
         *  - `select`: `multiselectsearcher`
         *  - `textarea`: `textsearcher`
         *  - `textfield`: `textsearcher`
         *  - `url`: `exacttextsearcher`
         *  - `userpicker`: `userpickergroupsearcher`
         *  - `version`: `versionsearcher`
         * 
         * @var 'com.atlassian.jira.plugin.system.customfieldtypes:cascadingselectsearcher'|'com.atlassian.jira.plugin.system.customfieldtypes:daterange'|'com.atlassian.jira.plugin.system.customfieldtypes:datetimerange'|'com.atlassian.jira.plugin.system.customfieldtypes:exactnumber'|'com.atlassian.jira.plugin.system.customfieldtypes:exacttextsearcher'|'com.atlassian.jira.plugin.system.customfieldtypes:grouppickersearcher'|'com.atlassian.jira.plugin.system.customfieldtypes:labelsearcher'|'com.atlassian.jira.plugin.system.customfieldtypes:multiselectsearcher'|'com.atlassian.jira.plugin.system.customfieldtypes:numberrange'|'com.atlassian.jira.plugin.system.customfieldtypes:projectsearcher'|'com.atlassian.jira.plugin.system.customfieldtypes:textsearcher'|'com.atlassian.jira.plugin.system.customfieldtypes:userpickergroupsearcher'|'com.atlassian.jira.plugin.system.customfieldtypes:versionsearcher'|null
         */
        public ?string $searcherKey = null,
    ) {
    }
}
