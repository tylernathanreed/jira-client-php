<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of the custom field options for a context. */
final readonly class CustomFieldContextOption extends Dto
{
    public function __construct(
        /** Whether the option is disabled. */
        public bool $disabled,

        /** The ID of the custom field option. */
        public string $id,

        /** The value of the custom field option. */
        public string $value,

        /** For cascading options, the ID of the custom field option containing the cascading option. */
        public ?string $optionId = null,
    ) {
    }
}
