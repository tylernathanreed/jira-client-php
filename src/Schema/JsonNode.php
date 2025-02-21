<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class JsonNode extends Dto
{
    public function __construct(
        public ?bool $array = null,

        public ?bool $bigDecimal = null,

        public ?bool $bigInteger = null,

        public ?int $bigIntegerValue = null,

        public ?bool $binary = null,

        public ?array $binaryValue = null,

        public ?bool $boolean = null,

        public ?bool $booleanValue = null,

        public ?bool $containerNode = null,

        public ?float $decimalValue = null,

        public ?bool $double = null,

        public ?float $doubleValue = null,

        public ?object $elements = null,

        public ?object $fieldNames = null,

        public ?object $fields = null,

        public ?bool $floatingPointNumber = null,

        public ?bool $int = null,

        public ?int $intValue = null,

        public ?bool $integralNumber = null,

        public ?bool $long = null,

        public ?int $longValue = null,

        public ?bool $missingNode = null,

        public ?bool $null = null,

        public ?bool $number = null,

        public ?string $numberType = null,

        public ?float $numberValue = null,

        public ?bool $object = null,

        public ?bool $pojo = null,

        public ?string $textValue = null,

        public ?bool $textual = null,

        public ?bool $valueAsBoolean = null,

        public ?float $valueAsDouble = null,

        public ?int $valueAsInt = null,

        public ?int $valueAsLong = null,

        public ?string $valueAsText = null,

        public ?bool $valueNode = null,
    ) {
    }
}
