<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A project's sender email address. */
final readonly class ProjectEmailAddress extends Dto
{
    public function __construct(
        /** The email address. */
        public ?string $emailAddress = null,

        /**
         * When using a custom domain, the status of the email address.
         * 
         * @var ?list<string>
         */
        public ?array $emailAddressStatus = null,
    ) {
    }
}
