<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/**
 * Defines the payload for the screen schemes.
 * See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-schemes/\#api-rest-api-3-screenscheme-post
 */
final readonly class ScreenSchemePayload extends Dto
{
    public function __construct(
        public ?ProjectCreateResourceIdentifier $defaultScreen = null,

        /**
         * The description of the screen scheme
         * 
         * @example 'This is a screen scheme'
         */
        public ?string $description = null,

        /**
         * The name of the screen scheme
         * 
         * @example 'My Screen Scheme'
         */
        public ?string $name = null,

        public ?ProjectCreateResourceIdentifier $pcri = null,

        /**
         * Similar to the field layout scheme those mappings allow users to set different screens for different operations: default - always there, applied to all operations that don't have an explicit mapping `create`, `view`, `edit` - specific operations that are available and users can assign a different screen for each one of them https://support.atlassian.com/jira-cloud-administration/docs/manage-screen-schemes/\#Associating-a-screen-with-an-issue-operation
         * 
         * @var array<string,ProjectCreateResourceIdentifier>
         */
        public ?array $screens = null,
    ) {
    }
}
