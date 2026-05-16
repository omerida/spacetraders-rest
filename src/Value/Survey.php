<?php

namespace Phparch\SpaceTradersRest\Value;

use Phparch\SpaceTradersRest\Trait\MapFromArray;

final class Survey
{
    use MapFromArray;

    public function __construct(
        /** @var non-empty-string */
        public string $signature,
        public string $symbol,
        /** @var Goods\Symbol[] $deposits */
        public array $deposits,
        public \DateTimeImmutable $expiration,
        public Survey\Size $size,
    ) {
    }
}
