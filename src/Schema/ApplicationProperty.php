<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class ApplicationProperty extends Dto
{
    public function __construct(
        /** @var ?list<string> */
        public ?array $allowedValues = null,

        /** The default value of the application property. */
        public ?string $defaultValue = null,

        /** The description of the application property. */
        public ?string $desc = null,

        public ?string $example = null,

        /**
         * The ID of the application property.
         * The ID and key are the same.
         */
        public ?string $id = null,

        /**
         * The key of the application property.
         * The ID and key are the same.
         */
        public ?string $key = null,

        /** The name of the application property. */
        public ?string $name = null,

        /** The data type of the application property. */
        public ?string $type = null,

        /** The new value. */
        public ?string $value = null,
    ) {
    }
}
