<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class RichText extends Dto
{
    public function __construct(
        public ?bool $empty = null,

        public ?bool $emptyAdf = null,

        public ?bool $finalised = null,

        public ?bool $valueSet = null,
    ) {
    }
}
