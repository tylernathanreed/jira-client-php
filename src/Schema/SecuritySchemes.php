<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** List of security schemes. */
final class SecuritySchemes extends Dto
{
    public function __construct(
        /**
         * List of security schemes.
         * 
         * @var ?list<SecurityScheme>
         */
        public ?array $issueSecuritySchemes = null,
    ) {
    }
}
