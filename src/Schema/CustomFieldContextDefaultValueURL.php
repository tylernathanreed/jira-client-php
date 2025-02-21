<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The default value for a URL custom field. */
final readonly class CustomFieldContextDefaultValueURL extends Dto
{
    public function __construct(
        /** The ID of the context. */
        public string $contextId,

        public string $type,

        /** The default URL. */
        public string $url,
    ) {
    }
}
