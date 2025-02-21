<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of the projects the option is available in. */
final readonly class IssueFieldOptionConfiguration extends Dto
{
    public function __construct(
        /**
         * DEPRECATED
         * 
         * @var ?list<string>
         */
        public ?array $attributes = null,

        /**
         * Defines the projects that the option is available in.
         * If the scope is not defined, then the option is available in all projects.
         */
        public ?IssueFieldOptionScopeBean $scope = null,
    ) {
    }
}
