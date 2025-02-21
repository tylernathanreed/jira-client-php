<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldContextDefaultValueLabelsDoc
final readonly class CustomFieldContextDefaultValueLabels extends Dto
{
    public function __construct(
        /**
         * The default labels value.
         * 
         * @var list<string>
         */
        public array $labels,

        public string $type,
    ) {
    }
}
