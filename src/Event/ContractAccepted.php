<?php

namespace Phparch\SpaceTradersRest\Event;

use Phparch\SpaceTradersRest\Value\Contract;

/**
 * Dispatched when a contract is accepted.
 */
class ContractAccepted
{
    public function __construct(
        public readonly Contract\Accept $accepted
    ) {
    }
}
