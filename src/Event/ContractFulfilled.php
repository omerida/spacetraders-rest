<?php

namespace Phparch\SpaceTradersRest\Event;

use Phparch\SpaceTradersRest\Value\Contract;

/**
 * Dispatched when a contract is fulfilled.
 */
class ContractFulfilled
{
    public function __construct(
        public readonly Contract\Fulfill $fulfilled
    ) {
    }
}
