<?php

namespace Jira\Client;

use Illuminate\Http\Client\Response;
use RuntimeException;

class Processor
{
    public function __construct(
        protected Deserializer $deserializer
    ) {
    }

    /**
     * @param class-string<Dto>|true $schema
     *
     * @return ($schema is true ? true : Dto)
     */
    public function process(
        PendingOperation $operation,
        Response $response,
        int $successCode,
        string|bool $schema
    ): Dto|true {
        $statusCode = $response->getStatusCode();

        if ($statusCode === 404) {
            throw new RuntimeException(sprintf(
                '[404] Endpoint [%s] not found.',
                $operation->uri
            ), 404);
        }

        if ($statusCode === 405 && ! isset($schema[$statusCode])) {
            throw new RuntimeException(sprintf(
                '[405] Method [%s] against [%s] is not allowed.',
                strtoupper($operation->method),
                $operation->uri,
            ), 405);
        }

        if ($statusCode != $successCode) {
            throw new RuntimeException(sprintf(
                '[%s] Unexpected status code (Expected: %s).',
                $statusCode,
                $successCode,
            ), $statusCode);
        }

        if ($schema === true) {
            return true;
        }

        $data = $response->json();

        if (! is_array($data)) {
            throw new RuntimeException('Unable to decode response body: ' . $response->body());
        }

        /** @var array<string,mixed> $data */
        return $this->deserializer->deserialize($data, $schema);
    }
}
