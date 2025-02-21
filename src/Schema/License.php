<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// LicenseDoc
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
