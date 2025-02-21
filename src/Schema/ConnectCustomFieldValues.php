<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ConnectCustomFieldValuesDoc
final readonly class ConnectCustomFieldValues extends Dto
{
    public function __construct(
        /**
         * The list of custom field update details.
         * 
         * @var ?list<ConnectCustomFieldValue>
         */
        public ?array $updateValueList = null,
    ) {
    }
}
