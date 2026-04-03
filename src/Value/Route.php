<?php

namespace Phparch\SpaceTradersRest\Value;

use Phparch\SpaceTradersRest\Value\Ship\Destination;
use Phparch\SpaceTradersRest\Value\Ship\Origin;

class Route
{
    public function __construct(
        public readonly Destination $destination,
        public readonly Origin $origin,
        public readonly \DateTimeImmutable $departureTime,
        public readonly \DateTimeImmutable $arrival,
    ) {
    }
}
