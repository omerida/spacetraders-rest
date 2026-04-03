<?php

namespace Phparch\SpaceTradersRest\Value\Ship;

use Phparch\SpaceTradersRest\Trait\IsWaypointType;
use Phparch\SpaceTradersRest\Value\System;
use Phparch\SpaceTradersRest\Value\Waypoint;

class Destination
{
    use IsWaypointType;

    public function __construct(
        public readonly Waypoint\Symbol $symbol,
        public readonly Waypoint\Type $type,
        public readonly System\Symbol $systemSymbol,
        public int $x,
        public int $y,
    ) {
    }
}
