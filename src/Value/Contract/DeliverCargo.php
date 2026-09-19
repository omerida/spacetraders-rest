<?php

namespace Phparch\SpaceTradersRest\Value\Contract;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value\Contract;
use Phparch\SpaceTradersRest\Value\Ship\CargoDetails;

class DeliverCargo
{
    use MapFromArray;

    public function __construct(
        public Contract $contract,
        public CargoDetails $cargo,
    ) {
    }
}
