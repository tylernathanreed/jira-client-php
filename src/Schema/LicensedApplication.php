<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about a licensed Jira application. */
final readonly class LicensedApplication extends Dto
{
    public function __construct(
        /** The ID of the application. */
        public string $id,

        /**
         * The licensing plan.
         * 
         * @var 'UNLICENSED'|'FREE'|'PAID'
         */
        public string $plan,
    ) {
    }
}
