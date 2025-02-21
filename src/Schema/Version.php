<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// VersionDoc
final readonly class Version extends Dto
{
    public function __construct(
        /**
         * If the expand option `approvers` is used, returns a list containing the approvers for this version.
         * 
         * @var ?list<VersionApprover>
         */
        public ?array $approvers = null,

        /**
         * Indicates that the version is archived.
         * Optional when creating or updating a version.
         */
        public ?bool $archived = null,

        /**
         * The description of the version.
         * Optional when creating or updating a version.
         * The maximum size is 16,384 bytes.
         */
        public ?string $description = null,

        /** If the expand option `driver` is used, returns the Atlassian account ID of the driver. */
        public ?string $driver = null,

        /**
         * Use "expand" to include additional information about version in the response.
         * This parameter accepts a comma-separated list.
         * Expand options include:
         * 
         *  - `operations` Returns the list of operations available for this version
         *  - `issuesstatus` Returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*.
         * The *unmapped* property contains a count of issues with a status other than *to do*, *in progress*, and *done*
         *  - `driver` Returns the Atlassian account ID of the version driver
         *  - `approvers` Returns a list containing approvers for this version
         * 
         * Optional for create and update.
         * 
         * @link em>#expansion
         */
        public ?string $expand = null,

        /** The ID of the version. */
        public ?string $id = null,

        /**
         * If the expand option `issuesstatus` is used, returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*.
         * The *unmapped* property contains a count of issues with a status other than *to do*, *in progress*, and *done*.
         */
        public ?VersionIssuesStatus $issuesStatusForFixVersion = null,

        /**
         * The URL of the self link to the version to which all unfixed issues are moved when a version is released.
         * Not applicable when creating a version.
         * Optional when updating a version.
         */
        public ?string $moveUnfixedIssuesTo = null,

        /**
         * The unique name of the version.
         * Required when creating a version.
         * Optional when updating a version.
         * The maximum length is 255 characters.
         */
        public ?string $name = null,

        /**
         * If the expand option `operations` is used, returns the list of operations available for this version.
         * 
         * @var ?list<SimpleLink>
         */
        public ?array $operations = null,

        /** Indicates that the version is overdue. */
        public ?bool $overdue = null,

        /**
         * Deprecated.
         * Use `projectId`.
         */
        public ?string $project = null,

        /**
         * The ID of the project to which this version is attached.
         * Required when creating a version.
         * Not applicable when updating a version.
         */
        public ?int $projectId = null,

        /**
         * The release date of the version.
         * Expressed in ISO 8601 format (yyyy-mm-dd).
         * Optional when creating or updating a version.
         */
        public ?string $releaseDate = null,

        /**
         * Indicates that the version is released.
         * If the version is released a request to release again is ignored.
         * Not applicable when creating a version.
         * Optional when updating a version.
         */
        public ?bool $released = null,

        /** The URL of the version. */
        public ?string $self = null,

        /**
         * The start date of the version.
         * Expressed in ISO 8601 format (yyyy-mm-dd).
         * Optional when creating or updating a version.
         */
        public ?string $startDate = null,

        /** The date on which work on this version is expected to finish, expressed in the instance's *Day/Month/Year Format* date format. */
        public ?string $userReleaseDate = null,

        /** The date on which work on this version is expected to start, expressed in the instance's *Day/Month/Year Format* date format. */
        public ?string $userStartDate = null,
    ) {
    }
}
