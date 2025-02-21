<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueLinkTypesDoc
final readonly class IssueLinkTypes extends Dto
{
    public function __construct(
        /**
         * The issue link type bean.
         * 
         * @var ?list<IssueLinkType>
         */
        public ?array $issueLinkTypes = null,
    ) {
    }
}
