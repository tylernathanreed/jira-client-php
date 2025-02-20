<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The details of a workflow transition rules. */
final readonly class CreateWorkflowTransitionRulesDetails extends Dto
{
    public function __construct(
        /** The workflow conditions. */
        public ?CreateWorkflowCondition $conditions = null,

        /**
         * The workflow post functions
         * 
         * **Note:** The default post functions are always added to the *initial* transition, as in:
         * 
         *     "postFunctions": [
         *         {
         *             "type": "IssueCreateFunction"
         *         },
         *         {
         *             "type": "IssueReindexFunction"
         *         },
         *         {
         *             "type": "FireIssueEventFunction",
         *             "configuration": {
         *                 "event": {
         *                     "id": "1",
         *                     "name": "issue_created"
         *                 }
         *             }
         *         }
         *     ]
         * 
         * **Note:** The default post functions are always added to the *global* and *directed* transitions, as in:
         * 
         *     "postFunctions": [
         *         {
         *             "type": "UpdateIssueStatusFunction"
         *         },
         *         {
         *             "type": "CreateCommentFunction"
         *         },
         *         {
         *             "type": "GenerateChangeHistoryFunction"
         *         },
         *         {
         *             "type": "IssueReindexFunction"
         *         },
         *         {
         *             "type": "FireIssueEventFunction",
         *             "configuration": {
         *                 "event": {
         *                     "id": "13",
         *                     "name": "issue_generic"
         *                 }
         *             }
         *         }
         *     ]
         * 
         * @var ?list<CreateWorkflowTransitionRule>
         */
        public ?array $postFunctions = null,

        /**
         * The workflow validators
         * 
         * **Note:** The default permission validator is always added to the *initial* transition, as in:
         * 
         *     "validators": [
         *         {
         *             "type": "PermissionValidator",
         *             "configuration": {
         *                 "permissionKey": "CREATE_ISSUES"
         *             }
         *         }
         *     ]
         * 
         * @var ?list<CreateWorkflowTransitionRule>
         */
        public ?array $validators = null,
    ) {
    }
}
