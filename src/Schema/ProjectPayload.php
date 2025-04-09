<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** The payload for creating a project */
final readonly class ProjectPayload extends Dto
{
    public function __construct(
        public ?ProjectCreateResourceIdentifier $fieldLayoutSchemeId = null,

        public ?ProjectCreateResourceIdentifier $issueSecuritySchemeId = null,

        public ?ProjectCreateResourceIdentifier $issueTypeSchemeId = null,

        public ?ProjectCreateResourceIdentifier $issueTypeScreenSchemeId = null,

        public ?ProjectCreateResourceIdentifier $notificationSchemeId = null,

        public ?ProjectCreateResourceIdentifier $pcri = null,

        public ?ProjectCreateResourceIdentifier $permissionSchemeId = null,

        /**
         * The "project type", which defines the application-specific feature set.
         * If you don't specify the project template you have to specify the project type.
         * 
         * @link https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes
         * 
         * @var 'software'|'business'|'service_desk'|'product_discovery'|null
         * 
         * @example 'software'
         */
        public ?string $projectTypeKey = null,

        public ?ProjectCreateResourceIdentifier $workflowSchemeId = null,
    ) {
    }
}
