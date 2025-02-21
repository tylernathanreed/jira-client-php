<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Default value for a labels custom field. */
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
