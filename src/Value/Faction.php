<?php

namespace Phparch\SpaceTradersRest\Value;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value\Faction\FactionTrait;

class Faction
{
    use MapFromArray;

    /**
     * @param FactionTrait[] $traits
     */
    public function __construct(
        public readonly string $symbol,
        public readonly string $name,
        public readonly string $description,
        public readonly string $headquarters,
        public readonly array $traits,
        public readonly bool $isRecruiting,
    ) {
    }
}
