<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A list of issue link type beans. */
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
