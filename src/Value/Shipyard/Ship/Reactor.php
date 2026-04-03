<?php

namespace Phparch\SpaceTradersRest\Value\Shipyard\Ship;

use Phparch\SpaceTradersRest\Value\Ship\Reactor\Requirements;

class Reactor
{
    public function __construct(
        public readonly string $symbol,
        public readonly string $name,
        public readonly string $description,
        public readonly int $powerOutput,
        public readonly float $quality,
        public readonly float $condition,
        public readonly float $integrity,
        public Requirements $requirements,
    ) {
    }
}
