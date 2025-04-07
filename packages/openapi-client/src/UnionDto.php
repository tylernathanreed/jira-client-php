<?php

namespace Reedware\OpenApi\Client;

abstract readonly class UnionDto extends Dto
{
    /** @return list<class-string<Dto>> */
    abstract public function unionTypes(): array;
}
