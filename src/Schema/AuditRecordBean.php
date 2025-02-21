<?php

namespace Jira\Client\Schema;

use DateTimeImmutable;
use Jira\Client\Dto;

// AuditRecordBeanDoc
final readonly class AuditRecordBean extends Dto
{
    public function __construct(
        /**
         * The list of items associated with the changed record.
         * 
         * @var ?list<AssociatedItemBean>
         */
        public ?array $associatedItems = null,

        /**
         * Deprecated, use `authorAccountId` instead.
         * The key of the user who created the audit record.
         */
        public ?string $authorKey = null,

        /**
         * The category of the audit record.
         * For a list of these categories, see the help article "Auditing in Jira applications".
         * 
         * @link https://confluence.atlassian.com/x/noXKM
         */
        public ?string $category = null,

        /**
         * The list of values changed in the record event.
         * 
         * @var ?list<ChangedValueBean>
         */
        public ?array $changedValues = null,

        /** The date and time on which the audit record was created. */
        public ?DateTimeImmutable $created = null,

        /** The description of the audit record. */
        public ?string $description = null,

        /** The event the audit record originated from. */
        public ?string $eventSource = null,

        /** The ID of the audit record. */
        public ?int $id = null,

        public ?AssociatedItemBean $objectItem = null,

        /** The URL of the computer where the creation of the audit record was initiated. */
        public ?string $remoteAddress = null,

        /** The summary of the audit record. */
        public ?string $summary = null,
    ) {
    }
}
