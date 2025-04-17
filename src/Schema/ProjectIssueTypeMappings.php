<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The project and issue type mappings. */
final class ProjectIssueTypeMappings extends Dto
{
    public function __construct(
        /**
         * The project and issue type mappings.
         * 
         * @var list<ProjectIssueTypeMapping>
         */
        public array $mappings,
    ) {
    }
}
