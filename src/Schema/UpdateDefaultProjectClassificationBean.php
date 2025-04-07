<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** The request for updating the default project classification level. */
final readonly class UpdateDefaultProjectClassificationBean extends Dto
{
    public function __construct(
        /** The ID of the project classification. */
        public string $id,
    ) {
    }
}
