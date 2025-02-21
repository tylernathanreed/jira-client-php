<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// FieldConfigurationSchemeProjectsDoc
final readonly class FieldConfigurationSchemeProjects extends Dto
{
    public function __construct(
        /**
         * The IDs of projects using the field configuration scheme.
         * 
         * @var list<string>
         */
        public array $projectIds,

        public ?FieldConfigurationScheme $fieldConfigurationScheme = null,
    ) {
    }
}
