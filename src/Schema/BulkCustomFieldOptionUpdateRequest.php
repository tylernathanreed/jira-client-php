<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** Details of the options to update for a custom field. */
final readonly class BulkCustomFieldOptionUpdateRequest extends Dto
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
