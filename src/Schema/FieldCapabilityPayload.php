<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** Defines the payload for the fields, screens, screen schemes, issue type screen schemes, field layouts, and field layout schemes */
final readonly class FieldCapabilityPayload extends Dto
{
    public function __construct(
        /**
         * The custom field definitions.
         * See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-fields/\#api-rest-api-3-field-post
         * 
         * @var ?list<CustomFieldPayload>
         */
        public ?array $customFieldDefinitions = null,

        public ?FieldLayoutSchemePayload $fieldLayoutScheme = null,

        /**
         * The field layouts configuration.
         * 
         * @var ?list<FieldLayoutPayload>
         */
        public ?array $fieldLayouts = null,

        /**
         * The issue layouts configuration
         * 
         * @var ?list<IssueLayoutPayload>
         */
        public ?array $issueLayouts = null,

        public ?IssueTypeScreenSchemePayload $issueTypeScreenScheme = null,

        /**
         * The screen schemes See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-schemes/\#api-rest-api-3-screenscheme-post
         * 
         * @var ?list<ScreenSchemePayload>
         */
        public ?array $screenScheme = null,

        /**
         * The screens.
         * See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screens/\#api-rest-api-3-screens-post
         * 
         * @var ?list<ScreenPayload>
         */
        public ?array $screens = null,
    ) {
    }
}
