<?php

namespace Phparch\SpaceTradersRest\Value\Fleet;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value\Ship;

class WarpShip
{
    use MapFromArray;

    public function __construct(
        public Ship\Nav $nav,
        public Ship\Fuel $fuel,
        /** @var Ship\Event[] $events */
        public array $events,
    ) {
    }
}
