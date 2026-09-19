<?php

namespace Phparch\SpaceTradersRest\Event;

use Phparch\SpaceTradersRest\Value\Contract;

/**
 * Dispatched when contract cargo is delivered.
 */
class ContractCargoDelivered
{
    public function __construct(
        public readonly Contract\DeliverCargo $deliverCargo
    ) {
    }
}
