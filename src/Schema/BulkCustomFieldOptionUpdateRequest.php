<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details of the options to update for a custom field. */
final class BulkCustomFieldOptionUpdateRequest extends Dto
{
    public function __construct(
        /**
         * Details of the options to update.
         * 
         * @var ?list<CustomFieldOptionUpdate>
         */
        public ?array $options = null,
    ) {
    }
}
