<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ContextualConfigurationDoc
final readonly class ContextualConfiguration extends Dto
{
    public function __construct(
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
