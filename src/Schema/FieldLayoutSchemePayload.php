<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/**
 * Defines the payload for the field layout schemes.
 * See "Field Configuration Scheme" - https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/\#api-rest-api-3-fieldconfigurationscheme-post https://support.atlassian.com/jira-cloud-administration/docs/configure-a-field-configuration-scheme/
 */
final readonly class FieldLayoutSchemePayload extends Dto
{
    public function __construct(
        public ?ProjectCreateResourceIdentifier $defaultFieldLayout = null,

        /**
         * The description of the field layout scheme
         * 
         * @example 'This is a field layout scheme'
         */
        public ?string $description = null,

        /**
         * There is a default configuration "fieldlayout" that is applied to all issue types using this scheme that don't have an explicit mapping users can create (or re-use existing) configurations for other issue types and map them to this scheme
         * 
         * @var array<string,ProjectCreateResourceIdentifier>
         */
        public ?array $explicitMappings = null,

        /**
         * The name of the field layout scheme
         * 
         * @example 'My Field Layout Scheme'
         */
        public ?string $name = null,

        public ?ProjectCreateResourceIdentifier $pcri = null,
    ) {
    }
}
