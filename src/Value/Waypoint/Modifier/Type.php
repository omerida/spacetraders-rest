<?php

namespace Phparch\SpaceTradersRest\Value\Waypoint\Modifier;

enum Type: string
{
    case STRIPPED = "STRIPPED";
    case UNSTABLE = "UNSTABLE";
    case RADIATION_LEAK = "RADIATION_LEAK";
    case CRITICAL_LIMIT = "CRITICAL_LIMIT";
    case CIVIL_UNREST = "CIVIL_UNREST";
}
