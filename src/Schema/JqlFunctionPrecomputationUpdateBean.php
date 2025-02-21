<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Precomputation id and its new value. */
final readonly class JqlFunctionPrecomputationUpdateBean extends Dto
{
    public function __construct(
        /** The id of the precomputation to update. */
        public string $id,

        /** The error message to be displayed to the user if the given function clause is no longer valid during recalculation of the precomputation. */
        public ?string $error = null,

        /** The new value of the precomputation. */
        public ?string $value = null,
    ) {
    }
}
