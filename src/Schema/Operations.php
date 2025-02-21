<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of the operations that can be performed on the issue. */
final readonly class Operations extends Dto
{
    public function __construct(
        /**
         * Details of the link groups defining issue operations.
         * 
         * @var ?list<LinkGroup>
         */
        public ?array $linkGroups = null,
    ) {
    }
}
