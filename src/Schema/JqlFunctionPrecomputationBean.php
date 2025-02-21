<?php

namespace Jira\Client\Schema;

use DateTimeImmutable;
use Jira\Client\Dto;

/** Jql function precomputation. */
final readonly class JqlFunctionPrecomputationBean extends Dto
{
    public function __construct(
        /**
         * The list of arguments function was invoked with.
         * 
         * @var ?list<string>
         */
        public ?array $arguments = null,

        /** The timestamp of the precomputation creation. */
        public ?DateTimeImmutable $created = null,

        /** The error message to be displayed to the user. */
        public ?string $error = null,

        /** The field the function was executed against. */
        public ?string $field = null,

        /** The function key. */
        public ?string $functionKey = null,

        /** The name of the function. */
        public ?string $functionName = null,

        /** The id of the precomputation. */
        public ?string $id = null,

        /** The operator in context of which function was executed. */
        public ?string $operator = null,

        /** The timestamp of the precomputation last update. */
        public ?DateTimeImmutable $updated = null,

        /** The timestamp of the precomputation last usage. */
        public ?DateTimeImmutable $used = null,

        /** The JQL fragment stored as the precomputation. */
        public ?string $value = null,
    ) {
    }
}
