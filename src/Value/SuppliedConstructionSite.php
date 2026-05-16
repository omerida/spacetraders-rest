<?php

namespace Phparch\SpaceTradersRest\Value;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value\Ship\CargoDetails;

class SuppliedConstructionSite
{
    use MapFromArray;

    public function __construct(
        public Construction $construction,
        public CargoDetails $cargoDetails,
    ) {
    }
}
