<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// DataClassificationTagBeanDoc
final readonly class DataClassificationTagBean extends Dto
{
    public function __construct(
        /** The ID of the data classification object. */
        public string $id,

        /** The status of the data classification object. */
        public string $status,

        /** The color of the data classification object. */
        public ?string $color = null,

        /** The description of the data classification object. */
        public ?string $description = null,

        /** The guideline of the data classification object. */
        public ?string $guideline = null,

        /** The name of the data classification object. */
        public ?string $name = null,

        /** The rank of the data classification object. */
        public ?int $rank = null,
    ) {
    }
}
