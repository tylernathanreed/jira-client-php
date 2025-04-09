<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** Request to create a project using a custom template */
final readonly class ProjectCustomTemplateCreateRequestDTO extends Dto
{
    public function __construct(
        public ?CustomTemplatesProjectDetails $details = null,

        public ?CustomTemplateRequestDTO $template = null,
    ) {
    }
}
