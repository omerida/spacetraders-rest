<?php

namespace Phparch\SpaceTradersRest\Value\Shipyard;

use Phparch\SpaceTradersRest\Value\Ship;

class ShipType
{
    public function __construct(
        public readonly Ship\Type $type,
    ) {
    }
}
