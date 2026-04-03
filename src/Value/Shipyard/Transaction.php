<?php

namespace Phparch\SpaceTradersRest\Value\Shipyard;

use Phparch\SpaceTradersRest\Value\Ship;
use Phparch\SpaceTradersRest\Value\Waypoint\Symbol;

class Transaction
{
    public function __construct(
        public Symbol $waypointSymbol,
        public string $shipSymbol,
        public Ship\Type $shipType,
        /** @var non-negative-int */
        public int $price {
            set {
                if ($value < 0) {
                    throw new \InvalidArgumentException('price cannot be negative');
                }
                $this->price = $value;
            }
        },
        public string $agentSymbol,
        public readonly \DateTimeImmutable $timestamp,
    ) {
    }
}
