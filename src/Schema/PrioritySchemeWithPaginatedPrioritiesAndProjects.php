<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A priority scheme with paginated priorities and projects. */
final readonly class PrioritySchemeWithPaginatedPrioritiesAndProjects extends Dto
{
    public function __construct(
        /** The ID of the priority scheme. */
        public string $id,

        /** The name of the priority scheme */
        public string $name,

        public ?bool $default = null,

        /** The ID of the default issue priority. */
        public ?string $defaultPriorityId = null,

        /** The description of the priority scheme */
        public ?string $description = null,

        public ?bool $isDefault = null,

        /** The paginated list of priorities. */
        public ?PageBeanPriorityWithSequence $priorities = null,

        /** The paginated list of projects. */
        public ?PageBeanProjectDetails $projects = null,

        /** The URL of the priority scheme. */
        public ?string $self = null,
    ) {
    }
}
