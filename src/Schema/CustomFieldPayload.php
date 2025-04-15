<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/**
 * Defines the payload for the custom field definitions.
 * See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-fields/\#api-rest-api-3-field-post
 */
final readonly class CustomFieldPayload extends Dto
{
    public function __construct(
        /**
         * The type of the custom field
         * 
         * @example 'See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-fields/#api-rest-api-3-field-post `type` for values'
         */
        public ?string $cfType = null,

        /**
         * The description of the custom field
         * 
         * @example 'This is a custom field'
         */
        public ?string $description = null,

        /**
         * The name of the custom field
         * 
         * @example 'My Custom Field'
         */
        public ?string $name = null,

        /**
         * The strategy to use when there is a conflict with an existing custom field.
         * FAIL - Fail execution, this always needs to be unique; USE - Use the existing entity and ignore new entity parameters
         * 
         * @var 'FAIL'|'USE'|'NEW'|null
         */
        public ?string $onConflict = null,

        public ?ProjectCreateResourceIdentifier $pcri = null,

        /**
         * The searcher key of the custom field
         * 
         * @example 'See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-fields/#api-rest-api-3-field-post `searcherKey` for values'
         */
        public ?string $searcherKey = null,
    ) {
    }
}
