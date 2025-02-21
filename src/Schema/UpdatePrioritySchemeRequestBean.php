<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of a priority scheme. */
final readonly class UpdatePrioritySchemeRequestBean extends Dto
{
    public function __construct(
        /** The default priority of the scheme. */
        public ?int $defaultPriorityId = null,

        /** The description of the priority scheme. */
        public ?string $description = null,

        /**
         * Instructions to migrate the priorities of issues
         * 
         * `in` mappings are used to migrate the priorities of issues to priorities used within the priority scheme
         * 
         * `out` mappings are used to migrate the priorities of issues to priorities not used within the priority scheme
         * 
         *  - When **priorities** are **added** to the priority scheme, no mapping needs to be provided as the new priorities are not used by any issues
         *  - When **priorities** are **removed** from the priority scheme, issues that are using those priorities must be migrated to new priorities used by the priority scheme
         *     
         *      - An `in` mapping must be provided for each of these priorities
         *  - When **projects** are **added** to the priority scheme, the priorities of issues in those projects might need to be migrated to new priorities used by the priority scheme.
         * This can occur when the current scheme does not use all the priorities in the project(s)' priority scheme(s)
         *     
         *      - An `in` mapping must be provided for each of these priorities
         *  - When **projects** are **removed** from the priority scheme, the priorities of issues in those projects might need to be migrated to new priorities within the **Default Priority Scheme** that are not used by the priority scheme.
         * This can occur when the **Default Priority Scheme** does not use all the priorities within the current scheme
         *     
         *      - An `out` mapping must be provided for each of these priorities
         * 
         * For more information on `in` and `out` mappings, see the child properties documentation for the `PriorityMapping` object below.
         */
        public ?PriorityMapping $mappings = null,

        /**
         * The name of the priority scheme.
         * Must be unique.
         */
        public ?string $name = null,

        /** The priorities in the scheme. */
        public ?UpdatePrioritiesInSchemeRequestBean $priorities = null,

        /** The projects in the scheme. */
        public ?UpdateProjectsInSchemeRequestBean $projects = null,
    ) {
    }
}
