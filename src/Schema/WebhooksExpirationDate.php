<?php

namespace Jira\Client\Schema;

use DateTimeImmutable;
use Reedware\OpenApi\Client\Dto;

/** The date the refreshed webhooks expire. */
final readonly class WebhooksExpirationDate extends Dto
{
    public function __construct(
        /** The expiration date of all the refreshed webhooks. */
        public DateTimeImmutable $expirationDate,
    ) {
    }
}
