<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** List of security schemes. */
final readonly class SecuritySchemes extends Dto
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
