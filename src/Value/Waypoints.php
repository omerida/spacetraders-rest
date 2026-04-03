<?php

namespace Phparch\SpaceTradersRest\Value;

use Phparch\SpaceTradersRest\Trait\MapFromArray;

class Waypoints
{
    use MapFromArray;

    public function __construct(
        /** @var \Phparch\SpaceTradersRest\Value\Waypoint[] */
        public array $waypoints,
    ) {
    }
}
