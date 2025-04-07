<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** A page of workflow schemes. */
final readonly class WorkflowSchemeUsagePage extends Dto
{
    public function __construct(
        /** Token for the next page of issue type usages. */
        public ?string $nextPageToken = null,

        /**
         * The list of workflow schemes.
         * 
         * @var ?list<WorkflowSchemeUsage>
         */
        public ?array $values = null,
    ) {
    }
}
