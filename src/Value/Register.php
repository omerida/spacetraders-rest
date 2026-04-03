<?php

namespace Phparch\SpaceTradersRest\Value;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value;

class Register
{
    use MapFromArray;

    public function __construct(
        public readonly Agent $agent,
        public readonly Value\Contract $contract,
        public readonly Value\Faction $faction,
        public readonly Value\Ship $ship,
        public readonly string $token,
    ) {
    }
}
