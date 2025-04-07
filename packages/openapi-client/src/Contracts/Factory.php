<?php

namespace Reedware\OpenApi\Client\Contracts;

use Closure;
use GuzzleHttp\Promise\PromiseInterface;
use Reedware\OpenApi\Client\Configuration;
use Reedware\OpenApi\Client\PendingOperation;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface Factory
{
    public function make(PendingOperation $operation, Configuration $config): ResponseInterface;

    /** @param Closure(RequestInterface,array<string,mixed>):?PromiseInterface $callback */
    public function fake(Closure $callback): static;
}
