<?php

namespace Phparch\SpaceTradersRest\Value\Fleet;

use Phparch\SpaceTradersRest\Trait\MapFromArray;

class ShipMounts
{
    use MapFromArray;

    public function __construct(
        /** @var \Phparch\SpaceTradersRest\Value\Ship\Mount[] */
        public array $mounts,
    ) {
    }
}
