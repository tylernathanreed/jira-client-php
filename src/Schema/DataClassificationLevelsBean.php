<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The data classification. */
final readonly class DataClassificationLevelsBean extends Dto
{
    public function __construct(
        /**
         * The data classifications.
         * 
         * @var ?list<DataClassificationTagBean>
         */
        public ?array $classifications = null,
    ) {
    }
}
