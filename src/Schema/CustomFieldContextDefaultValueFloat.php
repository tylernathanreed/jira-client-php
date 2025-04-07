<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** Default value for a float (number) custom field. */
final readonly class CustomFieldContextDefaultValueFloat extends Dto
{
    public function __construct(
        /** The default floating-point number. */
        public float $number,

        public string $type,
    ) {
    }
}
