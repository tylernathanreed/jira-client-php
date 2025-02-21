<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class CreateCrossProjectReleaseRequest extends Dto
{
    public function __construct(
        /** The cross-project release name. */
        public string $name,

        /**
         * The IDs of the releases to include in the cross-project release.
         * 
         * @var ?list<int>
         */
        public ?array $releaseIds = null,
    ) {
    }
}
