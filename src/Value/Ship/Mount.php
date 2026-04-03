<?php

namespace Phparch\SpaceTradersRest\Value\Ship;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value\Ship\Mount\Deposit;
use Phparch\SpaceTradersRest\Value\Ship\Mount\Requirements;

class Mount
{
    use MapFromArray;

    public function __construct(
        public readonly Mount\Symbol $symbol,
        public readonly string $name,
        public readonly string $description,
        public readonly Requirements $requirements,
        /** @var non-negative-int */
        public int $strength {
            set {
                if ($value < 0) {
                    throw new \InvalidArgumentException('strength cannot be negative');
                }
                $this->strength = $value;
            }
        },
        /**
         * @var Deposit[]
         */
        public readonly array $deposits = [],
    ) {
    }
}
