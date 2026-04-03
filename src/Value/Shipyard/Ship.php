<?php

namespace Phparch\SpaceTradersRest\Value\Shipyard;

use Phparch\SpaceTradersRest\Value\Goods\SupplyLevel;
use Phparch\SpaceTradersRest\Value\Goods\TradeActivityLevel;
use Phparch\SpaceTradersRest\Value\Ship as Ships;
use Phparch\SpaceTradersRest\Value\Ship\Module;
use Phparch\SpaceTradersRest\Value\Ship\Mount;
use Phparch\SpaceTradersRest\Value\Shipyard\Ship\Crew;

class Ship
{
    public function __construct(
        public Ships\Type $type,
        public string $name,
        public string $description,
        public SupplyLevel $supply,
        public TradeActivityLevel $activity,
        public int $purchasePrice,
        public Ship\Frame $frame,
        public Ship\Reactor $reactor,
        public Ship\Engine $engine,
        /** @var Module[] */
        public array $modules,
        /** @var Mount[] */
        public array $mounts,
        public Crew $crew,
    ) {
    }
}
