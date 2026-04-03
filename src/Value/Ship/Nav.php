<?php

namespace Phparch\SpaceTradersRest\Value\Ship;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value\Route;
use Phparch\SpaceTradersRest\Value\System;
use Phparch\SpaceTradersRest\Value\Waypoint;

class Nav
{
    use MapFromArray;

    public function __construct(
        public readonly System\Symbol $systemSymbol,
        public readonly Waypoint\Symbol $waypointSymbol,
        public readonly Route $route,
        public readonly Status $status,
        public readonly FlightMode $flightMode,
    ) {
    }

    public function isInTransit(): bool
    {
        return $this->status === Status::IN_TRANSIT;
    }

    public function isInOrbit(): bool
    {
        return $this->status === Status::IN_ORBIT;
    }

    public function isDocked(): bool
    {
        return $this->status === Status::DOCKED;
    }
}
