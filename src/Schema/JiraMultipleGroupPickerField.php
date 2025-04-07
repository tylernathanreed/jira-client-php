<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class JiraMultipleGroupPickerField extends Dto
{
    public function __construct(
        public string $fieldId,

        /** @var list<JiraGroupInput> */
        public array $groups,
    ) {
    }
}
