<?php

namespace Phparch\SpaceTradersRest\Value;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value\Chart\Transaction;

class CreateChart
{
    use MapFromArray;

    public function __construct(
        public Chart $chart,
        public Waypoint $waypoint,
        public Transaction $transaction,
        public Agent $agent,
    ) {
    }
}
