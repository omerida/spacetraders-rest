<?php

namespace Phparch\SpaceTradersRest\Value\Ship;

class Event
{
    public function __construct(
        public Event\Type $symbol,
        public string $component,
        public string $name,
        public string $description,
    ) {
    }
}
