<?php

namespace Phparch\SpaceTradersRest\Value\Fleet;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value\Ship\CargoDetails;
use Phparch\SpaceTradersRest\Value\Ship\CoolDown;
use Phparch\SpaceTradersRest\Value\Ship\Event;
use Phparch\SpaceTradersRest\Value\Ship\Extraction\Details;

class SiphonResources
{
    use MapFromArray;

    public function __construct(
        public readonly Details $siphon,
        public readonly CoolDown $cooldown,
        public readonly CargoDetails $cargo,
        /** @var Event[] */
        public readonly array $events,
    ) {
    }
}
