<?php

namespace Phparch\SpaceTradersRest\Value;

class Material
{
    public function __construct(
        public Goods\Symbol $tradeSymbol,
        /** @var non-negative-int */
        public int $required,
        /** @var non-negative-int */
        public int $fulfilled,
        public bool $isComplete,
    ) {
    }
}
