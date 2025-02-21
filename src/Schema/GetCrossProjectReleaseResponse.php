<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// GetCrossProjectReleaseResponseDoc
final readonly class GetCrossProjectReleaseResponse extends Dto
{
    public function __construct(
        /** The cross-project release name. */
        public ?string $name = null,

        /**
         * The IDs of the releases included in the cross-project release.
         * 
         * @var ?list<int>
         */
        public ?array $releaseIds = null,
    ) {
    }
}
