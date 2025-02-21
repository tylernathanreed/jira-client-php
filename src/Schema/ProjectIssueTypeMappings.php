<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ProjectIssueTypeMappingsDoc
final readonly class ProjectIssueTypeMappings extends Dto
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
