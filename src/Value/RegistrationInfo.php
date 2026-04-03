<?php

namespace Phparch\SpaceTradersRest\Value;

use Phparch\SpaceTradersRest\Value\Faction\Symbol;

class RegistrationInfo
{
    public function __construct(
        public readonly string $name,
        public readonly Symbol $factionSymbol,
        public readonly Ship\RegisteredRole $role,
    ) {
    }
}
