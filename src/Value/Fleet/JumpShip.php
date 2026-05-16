<?php

namespace Phparch\SpaceTradersRest\Value\Fleet;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value\Agent;
use Phparch\SpaceTradersRest\Value\Market;
use Phparch\SpaceTradersRest\Value\Ship;

class JumpShip
{
    use MapFromArray;

    public function __construct(
        public Ship\Nav $nav,
        public Ship\CoolDown $coolDown,
        public Market\Transaction $transaction,
        public Agent $agent,
    ) {
    }
}
