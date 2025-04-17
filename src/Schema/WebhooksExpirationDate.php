<?php

namespace Jira\Client\Schema;

use DateTimeImmutable;
use Jira\Client\Http\Dto;

/** The date the refreshed webhooks expire. */
final class WebhooksExpirationDate extends Dto
{
    public function __construct(
        /** The expiration date of all the refreshed webhooks. */
        public DateTimeImmutable $expirationDate,
    ) {
    }
}
