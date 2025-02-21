<?php

namespace Jira\Client\Schema;

use DateTimeImmutable;
use Jira\Client\Dto;

/**
 * A log of changes made to issue fields.
 * Changelogs related to workflow associations are currently being deprecated.
 */
final readonly class Changelog extends Dto
{
    public function __construct(
        /** The user who made the change. */
        public ?UserDetails $author = null,

        /** The date on which the change took place. */
        public ?DateTimeImmutable $created = null,

        /** The history metadata associated with the changed. */
        public ?HistoryMetadata $historyMetadata = null,

        /** The ID of the changelog. */
        public ?string $id = null,

        /**
         * The list of items changed.
         * 
         * @var ?list<ChangeDetails>
         */
        public ?array $items = null,
    ) {
    }
}
