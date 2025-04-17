<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/**
 * The projects the item is associated with.
 * Indicated for items associated with "next-gen projects".
 * 
 * @link https://confluence.atlassian.com/x/loMyO
 */
final class Scope extends Dto
{
    public function __construct(
        /** The project the item has scope in. */
        public ?ProjectDetails $project = null,

        /**
         * The type of scope.
         * 
         * @var 'PROJECT'|'TEMPLATE'|null
         */
        public ?string $type = null,
    ) {
    }
}
