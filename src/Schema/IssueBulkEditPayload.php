<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Issue Bulk Edit Payload */
final readonly class IssueBulkEditPayload extends Dto
{
    public function __construct(
        /**
         * An object that defines the values to be updated in specified fields of an issue.
         * The structure and content of this parameter vary depending on the type of field being edited.
         * Although the order is not significant, ensure that field IDs align with those in selectedActions.
         */
        public JiraIssueFields $editedFieldsInput,

        /**
         * List of all the field IDs that are to be bulk edited.
         * Each field ID in this list corresponds to a specific attribute of an issue that is set to be modified in the bulk edit operation.
         * The relevant field ID can be obtained by calling the Bulk Edit Get Fields REST API (documentation available on this page itself).
         * 
         * @var list<string>
         */
        public array $selectedActions,

        /**
         * List of issue IDs or keys which are to be bulk edited.
         * These IDs or keys can be from different projects and issue types.
         * 
         * @var list<string>
         */
        public array $selectedIssueIdsOrKeys,

        /**
         * A boolean value that indicates whether to send a bulk change notification when the issues are being edited
         * 
         * If `true`, dispatches a bulk notification email to users about the updates.
         */
        public ?bool $sendBulkNotification = true,
    ) {
    }
}
