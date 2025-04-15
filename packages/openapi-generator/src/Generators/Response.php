<?php

namespace Reedware\OpenApi\Generators;

readonly class Response
{
    public function __construct(
        /** @var 'info'|'success'|'warn'|'error' $type */
        public string $type,
        public string $message,
    ) {
    }

    public static function info(string $message): static
    {
        return new static('info', $message);
    }

    public static function success(string $message): static
    {
        return new static('success', $message);
    }

    public static function warn(string $message): static
    {
        return new static('warn', $message);
    }

    public static function error(string $message): static
    {
        return new static('error', $message);
    }
}
