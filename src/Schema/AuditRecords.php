<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// AuditRecordsDoc
final readonly class AuditRecords extends Dto
{
    public function __construct(
        /** The requested or default limit on the number of audit items to be returned. */
        public ?int $limit = null,

        /** The number of audit items skipped before the first item in this list. */
        public ?int $offset = null,

        /**
         * The list of audit items.
         * 
         * @var ?list<AuditRecordBean>
         */
        public ?array $records = null,

        /** The total number of audit items returned. */
        public ?int $total = null,
    ) {
    }
}
