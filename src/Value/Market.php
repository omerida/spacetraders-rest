<?php

namespace Phparch\SpaceTradersRest\Value;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value\Goods\Detail;
use Phparch\SpaceTradersRest\Value\Market\TradeGoods;
use Phparch\SpaceTradersRest\Value\Market\Transaction;
use Phparch\SpaceTradersRest\Value\Waypoint\Symbol;

class Market
{
    use MapFromArray;

    public function __construct(
        public Symbol $symbol,
        /** @var Detail[] */
        public array $exports,
        /** @var Detail[] */
        public array $imports,
        /** @var Detail[] */
        public array $exchange,
        /** @var Transaction[] */
        public array $transactions = [],
        /** @var TradeGoods[] */
        public array $tradeGoods = [],
    ) {
    }
}
