<?php

namespace Phparch\SpaceTradersRest\Value;

enum TransactionType: string
{
    case PURCHASE = "PURCHASE";
    case SELL = "SELL";
}
