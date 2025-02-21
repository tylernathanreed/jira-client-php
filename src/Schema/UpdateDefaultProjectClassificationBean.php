<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// UpdateDefaultProjectClassificationBeanDoc
final readonly class UpdateDefaultProjectClassificationBean extends Dto
{
    public function __construct(
        /** The ID of the project classification. */
        public string $id,
    ) {
    }
}
