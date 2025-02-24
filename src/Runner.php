<?php

namespace Jira\Client;

use GuzzleHttp\RequestOptions;
use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;

class Runner
{
    public function __construct(
        public Factory $http,
    ) {}

    public function run(PendingOperation $operation, Configuration $config): Response
    {
        $request = $this->request($operation, $config);

        $uri = $operation->uri;
        $body = $operation->body instanceof Dto
            ? $operation->body->toArray()
            : $operation->body;

        return match ($operation->method) {
            'get' => $request->get($uri),
            'post' => $request->post($uri, $body),
            'put' => $request->put($uri, $body),
            'patch' => $request->patch($uri, $body),
            'delete' => $request->delete($uri, $body),
        };
    }

    public function request(PendingOperation $operation, Configuration $config): PendingRequest
    {
        return $this->newBaseRequest($config)
            ->withUrlParameters($operation->path)
            ->withQueryParameters($operation->query)
            ->accept(implode('; ', ['application/json']));
    }

    public function newBaseRequest(Configuration $config): PendingRequest
    {
        $request = $this->http
            ->baseUrl($config->host)
            ->withHeaders(array_filter([
                'User-Agent' => $config->userAgent,
            ]))
            ->withOptions([
                RequestOptions::DEBUG => $config->debug,
            ]);

        if (! empty($config->accessToken)) {
            $request->withToken($config->accessToken);
        } elseif (! empty($config->username) && ! empty($config->password)) {
            $request->withBasicAuth(
                $config->username,
                $config->password,
            );
        }

        return $request;
    }
}
