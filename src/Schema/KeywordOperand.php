<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// KeywordOperandDoc
final readonly class KeywordOperand extends Dto
{
    public function __construct(
        /**
         * The keyword that is the operand value.
         * 
         * @var 'empty'
         */
        public string $keyword,
    ) {
    }
}
