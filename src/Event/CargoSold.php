<?php

namespace Phparch\SpaceTradersRest\Event;

use Phparch\SpaceTradersRest\Value\Fleet;

/**
 * Dispatched when a contract is accepted.
 */
class CargoSold
{
    public function __construct(
        public readonly Fleet\SellCargo $sold
    ) {
    }
}
