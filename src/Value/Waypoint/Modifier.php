<?php

namespace Phparch\SpaceTradersRest\Value\Waypoint;

use Phparch\SpaceTradersRest\Value\Waypoint;

class Modifier
{
    public function __construct(
        public Waypoint\Modifier\Type $symbol,
        public string $name,
        public string $description,
    ) {
    }
}
