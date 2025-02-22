<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class JiraMultipleSelectField extends Dto
{
    public function __construct(
        public string $fieldId,

        /** @var list<JiraSelectedOptionField> */
        public array $options,
    ) {
    }
}
