<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of a field configuration scheme. */
final readonly class FieldConfigurationScheme extends Dto
{
    public function __construct(
        /** The ID of the field configuration scheme. */
        public string $id,

        /** The name of the field configuration scheme. */
        public string $name,

        /** The description of the field configuration scheme. */
        public ?string $description = null,
    ) {
    }
}
