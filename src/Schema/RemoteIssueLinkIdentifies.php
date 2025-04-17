<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details of the identifiers for a created or updated remote issue link. */
final class RemoteIssueLinkIdentifies extends Dto
{
    public function __construct(
        /** The ID of the remote issue link, such as the ID of the item on the remote system. */
        public ?int $id = null,

        /** The URL of the remote issue link. */
        public ?string $self = null,
    ) {
    }
}
