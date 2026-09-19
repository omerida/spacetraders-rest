<?php

namespace Phparch\SpaceTradersRest\Value\Contract;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value\Agent;
use Phparch\SpaceTradersRest\Value\Contract;

class Fulfill
{
    use MapFromArray;

    public function __construct(
        public Agent $agent,
        public Contract $contract,
    ) {
    }
}
