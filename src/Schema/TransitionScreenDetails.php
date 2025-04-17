<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The details of a transition screen. */
final class TransitionScreenDetails extends Dto
{
    public function __construct(
        /** The ID of the screen. */
        public string $id,

        /** The name of the screen. */
        public ?string $name = null,
    ) {
    }
}
