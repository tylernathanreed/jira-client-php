<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class BulkIssuePropertyUpdateRequest extends Dto
{
    public function __construct(
        /**
         * EXPERIMENTAL.
         * The Jira expression to calculate the value of the property.
         * The value of the expression must be an object that can be converted to JSON, such as a number, boolean, string, list, or map.
         * The context variables available to the expression are `issue` and `user`.
         * Issues for which the expression returns a value whose JSON representation is longer than 32768 characters are ignored.
         */
        public ?string $expression = null,

        /** The bulk operation filter. */
        public ?IssueFilterForBulkPropertySet $filter = null,

        /**
         * The value of the property.
         * The value must be a valid, non-empty JSON blob.
         * The maximum length is 32768 characters.
         * 
         * @link https://tools.ietf.org/html/rfc4627
         */
        public mixed $value = null,
    ) {
    }
}
