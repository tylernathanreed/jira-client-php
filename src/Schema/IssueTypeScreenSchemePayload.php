<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/**
 * Defines the payload for the issue type screen schemes.
 * See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-screen-schemes/\#api-rest-api-3-issuetypescreenscheme-post
 */
final class IssueTypeScreenSchemePayload extends Dto
{
    public function __construct(
        public ?ProjectCreateResourceIdentifier $defaultScreenScheme = null,

        /**
         * The description of the issue type screen scheme
         * 
         * @example 'This is an issue type screen scheme'
         */
        public ?string $description = null,

        /**
         * The IDs of the screen schemes for the issue type IDs and default.
         * A default entry is required to create an issue type screen scheme, it defines the mapping for all issue types without a screen scheme.
         * 
         * @var array<string,ProjectCreateResourceIdentifier>
         */
        public ?array $explicitMappings = null,

        /**
         * The name of the issue type screen scheme
         * 
         * @example 'My Issue Type Screen Scheme'
         */
        public ?string $name = null,

        public ?ProjectCreateResourceIdentifier $pcri = null,
    ) {
    }
}
