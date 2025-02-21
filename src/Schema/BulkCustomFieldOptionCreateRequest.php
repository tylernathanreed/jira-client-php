<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// BulkCustomFieldOptionCreateRequestDoc
final readonly class BulkCustomFieldOptionCreateRequest extends Dto
{
    public function __construct(
        /**
         * Details of options to create.
         * 
         * @var ?list<CustomFieldOptionCreate>
         */
        public ?array $options = null,
    ) {
    }
}
