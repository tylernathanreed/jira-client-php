<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The details of a UI modification's context, which define where to activate the UI modification. */
final readonly class UiModificationContextDetails extends Dto
{
    public function __construct(
        /** The ID of the UI modification context. */
        public ?string $id = null,

        /**
         * Whether a context is available.
         * For example, when a project is deleted the context becomes unavailable.
         */
        public ?bool $isAvailable = null,

        /**
         * The issue type ID of the context.
         * Null is treated as a wildcard, meaning the UI modification will be applied to all issue types.
         * Each UI modification context can have a maximum of one wildcard.
         */
        public ?string $issueTypeId = null,

        /**
         * The project ID of the context.
         * Null is treated as a wildcard, meaning the UI modification will be applied to all projects.
         * Each UI modification context can have a maximum of one wildcard.
         */
        public ?string $projectId = null,

        /**
         * The view type of the context.
         * Only `GIC`(Global Issue Create), `IssueView` and `IssueTransition` are supported.
         * Null is treated as a wildcard, meaning the UI modification will be applied to all view types.
         * Each UI modification context can have a maximum of one wildcard.
         * 
         * @var 'GIC'|'IssueView'|'IssueTransition'|null
         */
        public ?string $viewType = null,
    ) {
    }
}
