<?php

namespace Phparch\SpaceTradersRest\Event;

use Phparch\SpaceTradersRest\Value\Market;

/**
 * Dispatched when a market is scanned.
 */
class SystemMarketData
{
    public function __construct(
        public readonly Market $market,
    ) {
    }
}
