<?php

namespace Phparch\SpaceTradersRest\Value;

class JumpGate
{
    public function __construct(
        public string $symbol,
        /** @var string[] $connections */
        public array $connections,
    ){
    }
}
