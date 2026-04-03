<?php

namespace Phparch\SpaceTradersRest\Value\Fleet;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value\Agent;
use Phparch\SpaceTradersRest\Value\Ship\Fuel;
use Phparch\SpaceTradersRest\Value\Ship\RefuelTransaction;

class RefuelShip
{
    use MapFromArray;

    public function __construct(
        public Agent $agent,
        public Fuel $fuel,
        public RefuelTransaction $transaction,
    ) {
    }
}
