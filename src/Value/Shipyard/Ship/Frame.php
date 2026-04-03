<?php

namespace Phparch\SpaceTradersRest\Value\Shipyard\Ship;

use Phparch\SpaceTradersRest\Value\Ship\Frame\Requirements;

class Frame
{
    public function __construct(
        public readonly string $symbol,
        public readonly string $name,
        public readonly string $description,
        public readonly int $moduleSlots,
        public readonly int $mountingPoints,
        public readonly int $fuelCapacity,
        public readonly float $quality,
        public readonly float $condition,
        public readonly float $integrity,
        public Requirements $requirements,
    ) {
    }
}
