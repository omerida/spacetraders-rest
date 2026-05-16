<?php

namespace Phparch\SpaceTradersRest\Value\System;

enum Type: string
{
    case NEUTRON_STAR = 'neutron_star';
    case RED_STAR     = 'red_star';
    case ORANGE_STAR  = 'orange_star';
    case BLUE_STAR    = 'blue_star';
    case YOUNG_STAR   = 'young_star';
    case WHITE_DWARF  = 'white_dwarf';
    case BLACK_HOLE   = 'black_hole';
    case HYPERGIANT   = 'hypergiant';
    case NEBULA       = 'nebula';
    case UNSTABLE     = 'unstable';
}
