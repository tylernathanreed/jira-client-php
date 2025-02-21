<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The details of a transition screen. */
final readonly class TransitionScreenDetails extends Dto
{
    public function __construct(
        /** The ID of the screen. */
        public string $id,

        /** The name of the screen. */
        public ?string $name = null,
    ) {
    }
}
