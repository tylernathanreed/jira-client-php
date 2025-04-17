<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details of a user or group subscribing to a filter. */
final class FilterSubscription extends Dto
{
    public function __construct(
        /** The group subscribing to filter. */
        public ?GroupName $group = null,

        /** The ID of the filter subscription. */
        public ?int $id = null,

        /** The user subscribing to filter. */
        public ?User $user = null,
    ) {
    }
}
