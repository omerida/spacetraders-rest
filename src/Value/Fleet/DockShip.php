<?php

namespace Phparch\SpaceTradersRest\Value\Fleet;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value\Ship\Nav;

class DockShip
{
    use MapFromArray;

    public function __construct(
        public Nav $nav,
    ) {
    }
}
