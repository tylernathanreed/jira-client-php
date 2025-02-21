<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// SetDefaultLevelsRequestDoc
final readonly class SetDefaultLevelsRequest extends Dto
{
    public function __construct(
        /**
         * List of objects with issue security scheme ID and new default level ID.
         * 
         * @var list<DefaultLevelValue>
         */
        public array $defaultValues,
    ) {
    }
}
