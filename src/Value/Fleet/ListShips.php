<?php

namespace Phparch\SpaceTradersRest\Value\Fleet;

use Phparch\SpaceTradersRest\Trait\MapFromArray;

class ListShips
{
    use MapFromArray;

    public function __construct(
        /** @var \Phparch\SpaceTradersRest\Value\Ship[] */
        public array $ships,
    ) {
    }
}
