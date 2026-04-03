<?php

namespace Phparch\SpaceTradersRest\Value\Contract;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value\Agent;
use Phparch\SpaceTradersRest\Value\Contract;

class Accept
{
    use MapFromArray;

    public function __construct(
        public Contract $contract,
        public Agent $agent,
    ) {
    }
}
