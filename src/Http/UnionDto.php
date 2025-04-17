<?php

namespace Jira\Client\Http;

abstract class UnionDto extends Dto
{
    /** @return list<class-string<Dto>> */
    abstract public function unionTypes(): array;
}
