<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class DeleteAndReplaceVersionBean extends Dto
{
    public function __construct(
        /**
         * An array of custom field IDs (`customFieldId`) and version IDs (`moveTo`) to update when the fields contain the deleted version.
         * 
         * @var ?list<CustomFieldReplacement>
         */
        public ?array $customFieldReplacementList = null,

        /** The ID of the version to update `affectedVersion` to when the field contains the deleted version. */
        public ?int $moveAffectedIssuesTo = null,

        /** The ID of the version to update `fixVersion` to when the field contains the deleted version. */
        public ?int $moveFixIssuesTo = null,
    ) {
    }
}
