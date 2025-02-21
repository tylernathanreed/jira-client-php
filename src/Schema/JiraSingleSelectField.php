<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * Add or clear a single select field:
 * 
 *  - To add, specify the option with an `optionId`
 *  - To clear, pass an option with `optionId` as `-1`.
 */
final readonly class JiraSingleSelectField extends Dto
{
    public function __construct(
        public string $fieldId,

        public JiraSelectedOptionField $option,
    ) {
    }
}
