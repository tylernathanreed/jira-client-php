<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Request to create a project using a custom template */
final readonly class ProjectCustomTemplateCreateRequestDTO extends Dto
{
    public function __construct(
        public ?CustomTemplatesProjectDetails $details = null,

        public ?CustomTemplateRequestDTO $template = null,
    ) {
    }
}
