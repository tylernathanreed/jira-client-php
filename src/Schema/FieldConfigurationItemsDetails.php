<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details of field configuration items. */
final class FieldConfigurationItemsDetails extends Dto
{
    public function __construct(
        /**
         * Details of fields in a field configuration.
         * 
         * @var list<FieldConfigurationItem>
         */
        public array $fieldConfigurationItems,
    ) {
    }
}
