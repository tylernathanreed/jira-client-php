<?php

namespace Jira\Client\Http;

use Jira\Client\Http\Exceptions\InvalidBodyHttpException;
use Jira\Client\Http\Exceptions\MethodNotAllowedHttpException;
use Jira\Client\Http\Exceptions\NotFoundHttpException;
use Jira\Client\Http\Exceptions\UnsupportedStatusCodeHttpException;

class Processor
{
    public function __construct(
        protected Deserializer $deserializer
    ) {
    }

    /**
     * @param array{0:class-string<Dto>}|class-string<Dto>|true $schema
     *
     * @return ($schema is true ? true : ($schema is array ? list<Dto> : Dto))
     */
    public function process(
        PendingOperation $operation,
        Response $response,
        int $successCode,
        array|string|bool $schema
    ): array|Dto|true {
        $status = $response->status;

        if ($status === 404) {
            throw new NotFoundHttpException(sprintf(
                '[404] Endpoint [%s] not found.',
                $operation->getExpandedUri()
            ), 404);
        }

        if ($status === 405) {
            throw new MethodNotAllowedHttpException(sprintf(
                '[405] Method [%s] against [%s] is not allowed.',
                strtoupper($operation->method),
                $operation->getExpandedUri(),
            ), 405);
        }

        if ($status != $successCode) {
            throw new UnsupportedStatusCodeHttpException(sprintf(
                '[%s] Unexpected status code (Expected: %s).',
                $status,
                $successCode,
            ), $status);
        }

        if ($schema === true) {
            return true;
        }

        $body = (string) $response->body;

        $data = json_decode($body, true);

        if (! is_array($data)) {
            throw new InvalidBodyHttpException('Unable to decode response body: ' . $body);
        }

        if (is_array($schema)) {
            /** @var list<array<string,mixed>> $data */
            return $this->deserializer->deserialize($data, $schema[0], array: true);
        } else {
            /** @var array<string,mixed> $data */
            return $this->deserializer->deserialize($data, $schema);
        }
    }
}
