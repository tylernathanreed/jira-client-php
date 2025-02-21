<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueTypeScreenSchemeMappingDetailsDoc
final readonly class IssueTypeScreenSchemeMappingDetails extends Dto
{
    public function __construct(
        /**
         * The list of issue type to screen scheme mappings.
         * A *default* entry cannot be specified because a default entry is added when an issue type screen scheme is created.
         * 
         * @var list<IssueTypeScreenSchemeMapping>
         */
        public array $issueTypeMappings,
    ) {
    }
}
