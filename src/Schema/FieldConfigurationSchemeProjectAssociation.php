<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Associated field configuration scheme and project. */
final readonly class FieldConfigurationSchemeProjectAssociation extends Dto
{
    public function __construct(
        /** The ID of the project. */
        public string $projectId,

        /**
         * The ID of the field configuration scheme.
         * If the field configuration scheme ID is `null`, the operation assigns the default field configuration scheme.
         */
        public ?string $fieldConfigurationSchemeId = null,
    ) {
    }
}
