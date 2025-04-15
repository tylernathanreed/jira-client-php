<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/**
 * Defines the payload for the field layout configuration.
 * See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/\#api-rest-api-3-fieldconfiguration-post
 */
final readonly class FieldLayoutConfiguration extends Dto
{
    public function __construct(
        /** Whether to show the field */
        public ?bool $field = null,

        public ?ProjectCreateResourceIdentifier $pcri = null,

        /** Whether the field is required */
        public ?bool $required = null,
    ) {
    }
}
