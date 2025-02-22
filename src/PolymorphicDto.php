<?php

namespace Jira\Client;

use InvalidArgumentException;

abstract readonly class PolymorphicDto extends Dto
{
    abstract public static function discriminator(): string;

    /** @return array<string,class-string<Dto>> */
    abstract public static function discriminatorMap(): array;

    /** @return class-string<Dto> */
    public static function discriminate(string $discriminator): string
    {
        $type = static::discriminatorMap()[$discriminator] ?? null;

        if (is_null($type)) {
            throw new InvalidArgumentException(sprintf(
                'Could not find [%s] mapping for [%s].',
                static::class,
                $type
            ));
        }

        return $type;
    }

    /**
     * @param array<string,mixed> $data
     *
     * @return class-string<Dto>
     */
    public static function discriminateFromData(array $data): string
    {
        $discriminator = $data[static::discriminator()] ?? null;

        if (is_null($discriminator)) {
            throw new InvalidArgumentException(sprintf(
                'Could not find [%s] discriminator.',
                static::class,
            ));
        }

        if (! is_string($discriminator)) {
            throw new InvalidArgumentException(sprintf(
                'Discriminator for [%s] is not a string.',
                static::class,
            ));
        }

        return static::discriminate($discriminator);
    }
}
