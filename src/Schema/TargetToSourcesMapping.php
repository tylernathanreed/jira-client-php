<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** An object representing the mapping of issues and data related to destination entities, like fields and statuses, that are required during a bulk move. */
final readonly class TargetToSourcesMapping extends Dto
{
    public function __construct(
        /**
         * If `true`, when issues are moved into this target group, they will adopt the target project's default classification, if they don't have a classification already.
         * If they do have a classification, it will be kept the same even after the move.
         * Leave `targetClassification` empty when using this
         * 
         * If `false`, you must provide a `targetClassification` mapping for each classification associated with the selected issues
         * 
         * "Benefit from data classification"
         * 
         * @link https://support.atlassian.com/security-and-access-policies/docs/what-is-data-classification/
         */
        public bool $inferClassificationDefaults,

        /**
         * If `true`, values from the source issues will be retained for the mandatory fields in the field configuration of the destination project.
         * The `targetMandatoryFields` property shouldn't be defined
         * 
         * If `false`, the user is required to set values for mandatory fields present in the field configuration of the destination project.
         * Provide input by defining the `targetMandatoryFields` property
         */
        public bool $inferFieldDefaults,

        /**
         * If `true`, the statuses of issues being moved in this target group that are not present in the target workflow will be changed to the default status of the target workflow (see below).
         * Leave `targetStatus` empty when using this
         * 
         * If `false`, you must provide a `targetStatus` for each status not present in the target workflow
         * 
         * The default status in a workflow is referred to as the "initial status".
         * Each workflow has its own unique initial status.
         * When an issue is created, it is automatically assigned to this initial status.
         * Read more about configuring initial statuses: "Configure the initial status | Atlassian Support."
         * 
         * @link https://support.atlassian.com/jira-cloud-administration/docs/configure-the-initial-status/
         */
        public bool $inferStatusDefaults,

        /**
         * When an issue is moved, its subtasks (if there are any) need to be moved with it.
         * `inferSubtaskTypeDefault` helps with moving the subtasks by picking a random subtask type in the target project
         * 
         * If `true`, subtasks will automatically move to the same project as their parent
         * 
         * When they move:
         * 
         *  - Their `issueType` will be set to the default for subtasks in the target project
         *  - Values for mandatory fields will be retained from the source issues
         *  - Specifying separate mapping for implicit subtasks won’t be allowed
         * 
         * If `false`, you must manually move the subtasks.
         * They will retain the parent which they had in the current project after being moved.
         */
        public bool $inferSubtaskTypeDefault,

        /**
         * List of issue IDs or keys to be moved.
         * These issues must be from the same project, have the same issue type, and be from the same parent (if they’re subtasks).
         * 
         * @var ?list<string>
         */
        public ?array $issueIdsOrKeys = null,

        /**
         * List of the objects containing classifications in the source issues and their new values which need to be set during the bulk move operation
         * 
         *  - **You should only define this property when `inferClassificationDefaults` is `false`.**
         *  - **In order to provide mapping for issues which don't have a classification, use `"-1"`.**
         * 
         * @var ?list<TargetClassification>
         */
        public ?array $targetClassification = null,

        /**
         * List of objects containing mandatory fields in the target field configuration and new values that need to be set during the bulk move operation
         * 
         * The new values will only be applied if the field is mandatory in the target project and at least one issue from the source has that field empty, or if the field context is different in the target project (e.g.
         * project-scoped version fields)
         * 
         * **You should only define this property when `inferFieldDefaults` is `false`.**
         * 
         * @var ?list<TargetMandatoryFields>
         */
        public ?array $targetMandatoryFields = null,

        /**
         * List of the objects containing statuses in the source workflow and their new values which need to be set during the bulk move operation
         * 
         * The new values will only be applied if the source status is invalid for the target project and issue type
         * 
         * **You should only define this property when `inferStatusDefaults` is `false`.**
         * 
         * @var ?list<TargetStatus>
         */
        public ?array $targetStatus = null,
    ) {
    }
}
