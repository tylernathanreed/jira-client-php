<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of the contextual configuration for a custom field. */
final readonly class BulkContextualConfiguration extends Dto
{
    public function __construct(
        /** The ID of the custom field. */
        public string $customFieldId,

        /** The ID of the field context the configuration is associated with. */
        public string $fieldContextId,

        /** The ID of the configuration. */
        public string $id,

        /** The field configuration. */
        public mixed $configuration = null,

        /** The field value schema. */
        public mixed $schema = null,
    ) {
    }
}
