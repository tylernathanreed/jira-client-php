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
     * @param class-string<Dto>|true $schema
     *
     * @return ($schema is true ? true : Dto)
     */
    public function process(
        PendingOperation $operation,
        ResponseInterface $response,
        int $successCode,
        string|bool $schema
    ): Dto|true {
        $status = $response->getStatusCode();

        if ($status === 404) {
            throw new RuntimeException(sprintf(
                '[404] Endpoint [%s] not found.',
                $operation->uri
            ), 404);
        }

        if ($status === 405 && ! isset($schema[$status])) {
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

        /** @var array<string,mixed> $data */
        return $this->deserializer->deserialize($data, $schema);
    }
}
