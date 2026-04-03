<?php

namespace Phparch\SpaceTradersRest\Value;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value\Waypoint\Symbol;

class Shipyard
{
    use MapFromArray;

    public function __construct(
        public Symbol $symbol,
        public int $modificationsFee,
        /** @var Shipyard\ShipType[] */
        public array $shipTypes,
        /** @var Shipyard\Transaction[] */
        public array $transactions = [],
        /** @var Shipyard\Ship[] */
        public array $ships = [],
    ) {
    }
}
