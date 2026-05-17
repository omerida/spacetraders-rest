<?php

namespace Phparch\SpaceTradersRest\Value\Chart;

use Phparch\SpaceTradersRest\Value\Goods;
use Phparch\SpaceTradersRest\Value\TransactionType;
use Phparch\SpaceTradersRest\Value\Waypoint;

class Transaction
{
    public function __construct(
        public Waypoint\Symbol $waypointSymbol,
        public string $shipSymbol,
        /** @var non-negative-int */
        public int $totalPrice {
            set {
                if ($value < 0) {
                    throw new \InvalidArgumentException('totalPrice cannot be negative');
                }
                $this->totalPrice = $value;
            }
        },
        public readonly \DateTimeImmutable $timestamp,
    ) {
    }
}
