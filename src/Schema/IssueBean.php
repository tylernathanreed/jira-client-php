<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about an issue. */
final readonly class IssueBean extends Dto
{
    public function __construct(
        /** Details of changelogs associated with the issue. */
        public ?PageOfChangelogs $changelog = null,

        /** The metadata for the fields on the issue that can be amended. */
        public ?IssueUpdateMetadata $editmeta = null,

        /** Expand options that include additional issue details in the response. */
        public ?string $expand = null,

        public ?object $fields = null,

        public ?IncludedFields $fieldsToInclude = null,

        /** The ID of the issue. */
        public ?string $id = null,

        /** The key of the issue. */
        public ?string $key = null,

        /**
         * The ID and name of each field present on the issue.
         * 
         * @var array<string,string>
         */
        public ?array $names = null,

        /** The operations that can be performed on the issue. */
        public ?Operations $operations = null,

        /** Details of the issue properties identified in the request. */
        public ?object $properties = null,

        /** The rendered value of each field present on the issue. */
        public ?object $renderedFields = null,

        /** The schema describing each field present on the issue. */
        public ?JsonTypeBean $schema = null,

        /** The URL of the issue details. */
        public ?string $self = null,

        /**
         * The transitions that can be performed on the issue.
         * 
         * @var ?list<IssueTransition>
         */
        public ?array $transitions = null,

        /**
         * The versions of each field on the issue.
         * 
         * @var array<string,object>
         */
        public ?array $versionedRepresentations = null,
    ) {
    }
}
