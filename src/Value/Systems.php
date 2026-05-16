<?php

namespace Phparch\SpaceTradersRest\Value;

use Phparch\SpaceTradersRest\Trait\MapFromArray;

class Systems
{
    use MapFromArray;

    public function __construct(
        /** @var list<\Phparch\SpaceTradersRest\Value\System> */
        public array $systems = [],
    ) {
    }
}
