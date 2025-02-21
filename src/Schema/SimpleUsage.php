<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// SimpleUsageDoc
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
