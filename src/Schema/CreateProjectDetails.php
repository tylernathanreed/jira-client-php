<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about the project. */
final readonly class CreateProjectDetails extends Dto
{
    public function __construct(
        /**
         * Project keys must be unique and start with an uppercase letter followed by one or more uppercase alphanumeric characters.
         * The maximum length is 10 characters.
         */
        public string $key,

        /** The name of the project. */
        public string $name,

        /**
         * The default assignee when creating issues for this project.
         * 
         * @var 'PROJECT_LEAD'|'UNASSIGNED'|null
         */
        public ?string $assigneeType = null,

        /** An integer value for the project's avatar. */
        public ?int $avatarId = null,

        /**
         * The ID of the project's category.
         * A complete list of category IDs is found using the "Get all project categories" operation.
         */
        public ?int $categoryId = null,

        /** A brief description of the project. */
        public ?string $description = null,

        /**
         * The ID of the field configuration scheme for the project.
         * Use the "Get all field configuration schemes" operation to get a list of field configuration scheme IDs.
         * If you specify the field configuration scheme you cannot specify the project template key.
         */
        public ?int $fieldConfigurationScheme = null,

        /**
         * The ID of the issue security scheme for the project, which enables you to control who can and cannot view issues.
         * Use the "Get issue security schemes" resource to get all issue security scheme IDs.
         */
        public ?int $issueSecurityScheme = null,

        /**
         * The ID of the issue type scheme for the project.
         * Use the "Get all issue type schemes" operation to get a list of issue type scheme IDs.
         * If you specify the issue type scheme you cannot specify the project template key.
         */
        public ?int $issueTypeScheme = null,

        /**
         * The ID of the issue type screen scheme for the project.
         * Use the "Get all issue type screen schemes" operation to get a list of issue type screen scheme IDs.
         * If you specify the issue type screen scheme you cannot specify the project template key.
         */
        public ?int $issueTypeScreenScheme = null,

        /**
         * This parameter is deprecated because of privacy changes.
         * Use `leadAccountId` instead.
         * See the "migration guide" for details.
         * The user name of the project lead.
         * Either `lead` or `leadAccountId` must be set when creating a project.
         * Cannot be provided with `leadAccountId`.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/
         */
        public ?string $lead = null,

        /**
         * The account ID of the project lead.
         * Either `lead` or `leadAccountId` must be set when creating a project.
         * Cannot be provided with `lead`.
         */
        public ?string $leadAccountId = null,

        /**
         * The ID of the notification scheme for the project.
         * Use the "Get notification schemes" resource to get a list of notification scheme IDs.
         */
        public ?int $notificationScheme = null,

        /**
         * The ID of the permission scheme for the project.
         * Use the "Get all permission schemes" resource to see a list of all permission scheme IDs.
         */
        public ?int $permissionScheme = null,

        /**
         * A predefined configuration for a project.
         * The type of the `projectTemplateKey` must match with the type of the `projectTypeKey`.
         * 
         * @var 'com.pyxis.greenhopper.jira:gh-simplified-agility-kanban'|'com.pyxis.greenhopper.jira:gh-simplified-agility-scrum'|'com.pyxis.greenhopper.jira:gh-simplified-basic'|'com.pyxis.greenhopper.jira:gh-simplified-kanban-classic'|'com.pyxis.greenhopper.jira:gh-simplified-scrum-classic'|'com.pyxis.greenhopper.jira:gh-cross-team-template'|'com.pyxis.greenhopper.jira:gh-cross-team-planning-template'|'com.atlassian.servicedesk:simplified-it-service-management'|'com.atlassian.servicedesk:simplified-it-service-management-basic'|'com.atlassian.servicedesk:simplified-it-service-management-operations'|'com.atlassian.servicedesk:simplified-general-service-desk'|'com.atlassian.servicedesk:simplified-general-service-desk-it'|'com.atlassian.servicedesk:simplified-general-service-desk-business'|'com.atlassian.servicedesk:simplified-internal-service-desk'|'com.atlassian.servicedesk:simplified-external-service-desk'|'com.atlassian.servicedesk:simplified-hr-service-desk'|'com.atlassian.servicedesk:simplified-facilities-service-desk'|'com.atlassian.servicedesk:simplified-legal-service-desk'|'com.atlassian.servicedesk:simplified-marketing-service-desk'|'com.atlassian.servicedesk:simplified-finance-service-desk'|'com.atlassian.servicedesk:simplified-analytics-service-desk'|'com.atlassian.servicedesk:simplified-design-service-desk'|'com.atlassian.servicedesk:simplified-sales-service-desk'|'com.atlassian.servicedesk:simplified-halp-service-desk'|'com.atlassian.servicedesk:simplified-blank-project-it'|'com.atlassian.servicedesk:simplified-blank-project-business'|'com.atlassian.servicedesk:next-gen-it-service-desk'|'com.atlassian.servicedesk:next-gen-hr-service-desk'|'com.atlassian.servicedesk:next-gen-legal-service-desk'|'com.atlassian.servicedesk:next-gen-marketing-service-desk'|'com.atlassian.servicedesk:next-gen-facilities-service-desk'|'com.atlassian.servicedesk:next-gen-general-service-desk'|'com.atlassian.servicedesk:next-gen-general-it-service-desk'|'com.atlassian.servicedesk:next-gen-general-business-service-desk'|'com.atlassian.servicedesk:next-gen-analytics-service-desk'|'com.atlassian.servicedesk:next-gen-finance-service-desk'|'com.atlassian.servicedesk:next-gen-design-service-desk'|'com.atlassian.servicedesk:next-gen-sales-service-desk'|'com.atlassian.jira-core-project-templates:jira-core-simplified-content-management'|'com.atlassian.jira-core-project-templates:jira-core-simplified-document-approval'|'com.atlassian.jira-core-project-templates:jira-core-simplified-lead-tracking'|'com.atlassian.jira-core-project-templates:jira-core-simplified-process-control'|'com.atlassian.jira-core-project-templates:jira-core-simplified-procurement'|'com.atlassian.jira-core-project-templates:jira-core-simplified-project-management'|'com.atlassian.jira-core-project-templates:jira-core-simplified-recruitment'|'com.atlassian.jira-core-project-templates:jira-core-simplified-task-'|null
         */
        public ?string $projectTemplateKey = null,

        /**
         * The "project type", which defines the application-specific feature set.
         * If you don't specify the project template you have to specify the project type.
         * 
         * @link https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes
         * 
         * @var 'software'|'service_desk'|'business'|null
         */
        public ?string $projectTypeKey = null,

        /** A link to information about this project, such as project documentation */
        public ?string $url = null,

        /**
         * The ID of the workflow scheme for the project.
         * Use the "Get all workflow schemes" operation to get a list of workflow scheme IDs.
         * If you specify the workflow scheme you cannot specify the project template key.
         */
        public ?int $workflowScheme = null,
    ) {
    }
}
