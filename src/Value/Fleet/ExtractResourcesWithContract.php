<?php

namespace Phparch\SpaceTradersRest\Value\Fleet;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value\Ship\CargoDetails;
use Phparch\SpaceTradersRest\Value\Ship\CoolDown;
use Phparch\SpaceTradersRest\Value\Ship\Event;
use Phparch\SpaceTradersRest\Value\Ship\Extraction;

class ExtractResourcesWithContract
{
    use MapFromArray;

    public function __construct(
        public readonly Extraction\Details $extraction,
        public readonly CoolDown $cooldown,
        public readonly CargoDetails $cargo,
        /** @var Event[] */
        public readonly array $events,
        /** @var array<array<string, string>> */
        public readonly array $modifiers = [],
    ) {
    }
}
