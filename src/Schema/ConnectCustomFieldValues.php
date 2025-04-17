<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details of updates for a custom field. */
final class ConnectCustomFieldValues extends Dto
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
