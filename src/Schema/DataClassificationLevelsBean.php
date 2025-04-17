<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The data classification. */
final class DataClassificationLevelsBean extends Dto
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
