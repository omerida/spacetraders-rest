<?php

namespace Phparch\SpaceTradersRest\Value\Fleet;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value\Agent;
use Phparch\SpaceTradersRest\Value\Market\Transaction;
use Phparch\SpaceTradersRest\Value\Ship\CargoDetails;

class SellCargo
{
    use MapFromArray;

    public function __construct(
        public Agent $agent,
        public CargoDetails $cargo,
        public Transaction $transaction,
    ) {
    }
}
