<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The details of an issue type screen scheme. */
final readonly class IssueTypeScreenSchemeDetails extends Dto
{
    public function __construct(
        /**
         * The IDs of the screen schemes for the issue type IDs and *default*.
         * A *default* entry is required to create an issue type screen scheme, it defines the mapping for all issue types without a screen scheme.
         * 
         * @var list<IssueTypeScreenSchemeMapping>
         */
        public array $issueTypeMappings,

        /**
         * The name of the issue type screen scheme.
         * The name must be unique.
         * The maximum length is 255 characters.
         */
        public string $name,

        /**
         * The description of the issue type screen scheme.
         * The maximum length is 255 characters.
         */
        public ?string $description = null,
    ) {
    }
}
