<?php

namespace Jira\Client;

use RuntimeException;
use Psr\Http\Message\ResponseInterface;

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
        ResponseInterface $response,
        int $successCode,
        array|string|bool $schema
    ): array|Dto|true {
        $status = $response->getStatusCode();

        if ($status === 404) {
            throw new RuntimeException(sprintf(
                '[404] Endpoint [%s] not found.',
                $operation->uri
            ), 404);
        }

        if ($status === 405) {
            throw new RuntimeException(sprintf(
                '[405] Method [%s] against [%s] is not allowed.',
                strtoupper($operation->method),
                $operation->uri,
            ), 405);
        }

        if ($status != $successCode) {
            throw new RuntimeException(sprintf(
                '[%s] Unexpected status code (Expected: %s).',
                $status,
                $successCode,
            ), $status);
        }

        if ($schema === true) {
            return true;
        }

        $body = (string) $response->getBody();

        $data = json_decode($body, true);

        if (! is_array($data)) {
            throw new RuntimeException('Unable to decode response body: ' . $body);
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
