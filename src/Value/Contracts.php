<?php

namespace Phparch\SpaceTradersRest\Value;

use Phparch\SpaceTradersRest\Trait\MapFromArray;

class Contracts
{
    use MapFromArray;

    public function __construct(
        /** @var list<\Phparch\SpaceTradersRest\Value\Contract> */
        public array $contracts = [],
    ) {
    }
}
