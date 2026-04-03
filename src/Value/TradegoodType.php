<?php

namespace Phparch\SpaceTradersRest\Value;

enum TradegoodType: string
{
    case EXPORT = "EXPORT";
    case IMPORT = "IMPORT";
    case EXCHANGE = "EXCHANGE";
}
