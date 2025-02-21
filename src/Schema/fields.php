<?php

namespace Jira\Client\Schema;

use Jira\Client\PolymorphicDto;

/** Can contain multiple field values of following types depending on `type` key */
final readonly class DummyClass extends PolymorphicDto
{
    public function __construct(
        /** If `true`, will try to retain original non-null issue field values on move. */
        public ?bool $retain = 1,

        public ?string $type = null,

        public ?object $value = null,
    ) {
    }

    public static function discriminator(): string
    {
        return 'type';
    }

    /** @return array<string,class-string<Dto>> */
    public static function discriminatorMap(): array
    {
        return [
            'mandatoryField' => MandatoryFieldValue::class,
            'mandatoryFieldForADF' => MandatoryFieldValueForADF::class,
        ];
    }

    /** @return list<class-string<Dto>> */
    public function unionTypes(): array
    {
        return [
            MandatoryFieldValue::class,
            MandatoryFieldValueForADF::class,
        ];
    }
}
