<?php

namespace Phparch\SpaceTradersRest\Value;

use Phparch\SpaceTradersRest\Trait\MapFromArray;

class System
{
    use MapFromArray;

    public function __construct(
        public string $constellation,
        public string $symbol {
            set {
                if (empty(trim($value))) {
                    throw new \InvalidArgumentException('id cannot be empty');
                }
                $this->symbol = $value;
            }
        },
        public string $sectorSymbol,
        public System\Type $symbolType,
        public int $x,
        public int $y,
        public Waypoints $waypoints,
        public Factions $factions,
        public string $name,
    ) {}
}
