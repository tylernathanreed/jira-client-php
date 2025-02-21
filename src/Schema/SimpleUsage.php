<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Represents a usage of an entity by a project ID and related issue type IDs. */
final readonly class SimpleUsage extends Dto
{
    public function __construct(
        /**
         * The issue type IDs for the usage.
         * 
         * @var list<string>
         */
        public array $issueTypeIds,

        /** The project ID for the usage. */
        public string $projectId,
    ) {
    }
}
