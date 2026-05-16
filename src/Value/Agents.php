<?php

namespace Phparch\SpaceTradersRest\Value;

use Phparch\SpaceTradersRest\Trait\MapFromArray;

class Agents
{
    use MapFromArray;

    public function __construct(
        /** @var list<\Phparch\SpaceTradersRest\Value\Agent> */
        public array $agents = [],
    ) {
    }
}
