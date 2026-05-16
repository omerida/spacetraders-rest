<?php

namespace Phparch\SpaceTradersRest\Value;

use Phparch\SpaceTradersRest\Trait\MapFromArray;

class Construction
{
    use MapFromArray;

    public function __construct(
        public string $symbol,
        /** @var Material[] $materials */
        public array $materials,
        public bool $isComplete
    ){
    }
}
