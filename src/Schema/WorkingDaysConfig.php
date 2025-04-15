<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Working days configuration */
final readonly class WorkingDaysConfig extends Dto
{
    public function __construct(
        public ?bool $friday = null,

        public ?int $id = null,

        public ?bool $monday = null,

        /** @var ?list<NonWorkingDay> */
        public ?array $nonWorkingDays = null,

        public ?bool $saturday = null,

        public ?bool $sunday = null,

        public ?bool $thursday = null,

        public ?string $timezoneId = null,

        public ?bool $tuesday = null,

        public ?bool $wednesday = null,
    ) {
    }
}
