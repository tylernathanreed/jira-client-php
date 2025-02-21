<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about a license for the Jira instance. */
final readonly class License extends Dto
{
    public function __construct(
        /**
         * The applications under this license.
         * 
         * @var list<LicensedApplication>
         */
        public array $applications,
    ) {
    }
}
