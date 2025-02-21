<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// OperationsDoc
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
