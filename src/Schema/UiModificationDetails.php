<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The details of a UI modification. */
final readonly class UiModificationDetails extends Dto
{
    public function __construct(
        /** The ID of the UI modification. */
        public string $id,

        /**
         * The name of the UI modification.
         * The maximum length is 255 characters.
         */
        public string $name,

        /** The URL of the UI modification. */
        public string $self,

        /**
         * List of contexts of the UI modification.
         * The maximum number of contexts is 1000.
         * 
         * @var ?list<UiModificationContextDetails>
         */
        public ?array $contexts = null,

        /**
         * The data of the UI modification.
         * The maximum size of the data is 50000 characters.
         */
        public ?string $data = null,

        /**
         * The description of the UI modification.
         * The maximum length is 255 characters.
         */
        public ?string $description = null,
    ) {
    }
}
