<?php

namespace Phparch\SpaceTradersRest\Value;

class Chart
{
    public function __construct(
        public Waypoint\Symbol $waypoint,
        public string $submittedBy,
        public \DateTimeImmutable $submittedOn,
    ) {
    }
}
