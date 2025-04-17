<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/**
 * Defines the payload for the field screens.
 * See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screens/\#api-rest-api-3-screens-post
 */
final class ScreenPayload extends Dto
{
    public function __construct(
        /**
         * The description of the screen
         * 
         * @example 'This is a screen'
         */
        public ?string $description = null,

        /**
         * The name of the screen
         * 
         * @example 'My Screen'
         */
        public ?string $name = null,

        public ?ProjectCreateResourceIdentifier $pcri = null,

        /**
         * The tabs of the screen.
         * See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-tab-fields/\#api-rest-api-3-screens-screenid-tabs-tabid-fields-post
         * 
         * @var ?list<TabPayload>
         */
        public ?array $tabs = null,
    ) {
    }
}
