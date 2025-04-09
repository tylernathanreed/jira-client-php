<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/**
 * Defines the payload for the field layouts.
 * See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/\#api-group-issue-field-configurations" + fieldlayout is what users would see as "Field Configuration" in Jira's UI - https://support.atlassian.com/jira-cloud-administration/docs/manage-issue-field-configurations/
 */
final readonly class FieldLayoutPayload extends Dto
{
    public function __construct(
        /**
         * The field layout configuration.
         * See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/\#api-rest-api-3-fieldconfiguration-post
         * 
         * @var ?list<FieldLayoutConfiguration>
         */
        public ?array $configuration = null,

        /**
         * The description of the field layout
         * 
         * @example 'This is a field layout'
         */
        public ?string $description = null,

        /**
         * The name of the field layout
         * 
         * @example 'My Field Layout'
         */
        public ?string $name = null,

        public ?ProjectCreateResourceIdentifier $pcri = null,
    ) {
    }
}
