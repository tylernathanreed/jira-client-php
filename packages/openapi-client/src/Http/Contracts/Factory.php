<?php

namespace Reedware\OpenApi\Client\Http\Contracts;

use Closure;
use GuzzleHttp\Promise\PromiseInterface;
use Reedware\OpenApi\Client\Configuration;
use Reedware\OpenApi\Client\Http\PendingOperation;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface Factory
{
    public function make(PendingOperation $operation, Configuration $config): ResponseInterface;

    /** @param Closure(RequestInterface,array<string,mixed>):?PromiseInterface $callback */
    public function fake(Closure $callback): static;
}
