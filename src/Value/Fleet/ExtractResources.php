<?php

namespace Phparch\SpaceTradersRest\Value\Fleet;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value\Ship\CargoDetails;
use Phparch\SpaceTradersRest\Value\Ship\CoolDown;
use Phparch\SpaceTradersRest\Value\Ship\Extraction\Details;

class ExtractResources
{
    use MapFromArray;

    public function __construct(
        public readonly CoolDown $cooldown,
        public readonly CargoDetails $cargo,
        public readonly Details $extraction,
        /** @var array<array<string, string>> */
        public readonly array $events,
        /** @var array<array<string, string>> */
        public readonly array $modifiers,
    ) {
    }
}
