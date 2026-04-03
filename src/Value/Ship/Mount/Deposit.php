<?php

namespace Phparch\SpaceTradersRest\Value\Ship\Mount;

use Phparch\SpaceTradersRest\Value\Ship;

class Deposit
{
    public function __construct(
        public readonly Ship\Mount\DepositSymbol $deposit,
    ) {
    }
}
