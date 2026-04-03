<?php

namespace Phparch\SpaceTradersRest\Value\Contract;

use Phparch\SpaceTradersRest\Value\PaymentTerms;

class Terms
{
    public function __construct(
        public readonly \DateTimeImmutable $deadline,
        public readonly PaymentTerms $payment,
        /** @var Deliver[] */
        public readonly array $deliver,
    ) {
    }
}
