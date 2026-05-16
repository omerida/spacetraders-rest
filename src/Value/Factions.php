<?php

namespace Phparch\SpaceTradersRest\Value;

use Phparch\SpaceTradersRest\Trait\MapFromArray;

class Factions
{
    use MapFromArray;

    public function __construct(
        /** @var list<\Phparch\SpaceTradersRest\Value\Faction> */
        public array $factions = []
    ) {
    }
}
