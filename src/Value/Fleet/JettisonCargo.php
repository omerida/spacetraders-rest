<?php

namespace Phparch\SpaceTradersRest\Value\Fleet;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value\Ship\CargoDetails;

class JettisonCargo
{
    use MapFromArray;

    public function __construct(
        public CargoDetails $cargo,
    ) {
    }
}
