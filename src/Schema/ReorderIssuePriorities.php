<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Change the order of issue priorities. */
final readonly class ReorderIssuePriorities extends Dto
{
    public function __construct(
        /**
         * The list of issue IDs to be reordered.
         * Cannot contain duplicates nor after ID.
         * 
         * @var list<string>
         */
        public array $ids,

        /**
         * The ID of the priority.
         * Required if `position` isn't provided.
         */
        public ?string $after = null,

        /**
         * The position for issue priorities to be moved to.
         * Required if `after` isn't provided.
         */
        public ?string $position = null,
    ) {
    }
}
