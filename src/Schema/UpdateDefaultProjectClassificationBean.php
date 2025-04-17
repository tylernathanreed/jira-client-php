<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The request for updating the default project classification level. */
final class UpdateDefaultProjectClassificationBean extends Dto
{
    public function __construct(
        /** The ID of the project classification. */
        public string $id,
    ) {
    }
}
