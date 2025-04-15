<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/**
 * Defines the payload for the tabs of the screen.
 * See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-tab-fields/\#api-rest-api-3-screens-screenid-tabs-tabid-fields-post
 */
final readonly class TabPayload extends Dto
{
    public function __construct(
        /**
         * The list of resource identifier of the field associated to the tab.
         * See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-tab-fields/\#api-rest-api-3-screens-screenid-tabs-tabid-fields-post
         * 
         * @var ?list<ProjectCreateResourceIdentifier>
         */
        public ?array $fields = null,

        /** The name of the tab */
        public ?string $name = null,
    ) {
    }
}
