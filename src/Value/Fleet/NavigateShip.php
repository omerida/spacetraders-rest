<?php

namespace Phparch\SpaceTradersRest\Value\Fleet;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value\Ship\Fuel;
use Phparch\SpaceTradersRest\Value\Ship\Nav;

class NavigateShip
{
    use MapFromArray;

    public function __construct(
        public Fuel $fuel,
        public Nav $nav,
        /** @var array<string, string> */
        public array $events,
    ) {
    }
}
