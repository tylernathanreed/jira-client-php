<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** A list of issue type screen scheme mappings. */
final class IssueTypeScreenSchemeMappingDetails extends Dto
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
