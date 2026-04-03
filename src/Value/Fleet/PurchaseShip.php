<?php

namespace Phparch\SpaceTradersRest\Value\Fleet;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value\Agent;
use Phparch\SpaceTradersRest\Value\Ship;
use Phparch\SpaceTradersRest\Value\Shipyard\Transaction;

class PurchaseShip
{
    use MapFromArray;

    public function __construct(
        public Agent $agent,
        public Ship $ship,
        public Transaction $transaction,
    ) {
    }
}
