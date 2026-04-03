<?php

namespace Phparch\SpaceTradersRest\Value\Goods;

class Detail
{
    public function __construct(
        public readonly Symbol $symbol,
        public readonly string $name,
        public readonly string $description,
    ) {
    }
}
