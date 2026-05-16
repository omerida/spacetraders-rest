<?php

namespace Phparch\SpaceTradersRest\Value\Fleet;

use Phparch\SpaceTradersRest\Trait\MapFromArray;
use Phparch\SpaceTradersRest\Value\Ship\CoolDown;
use Phparch\SpaceTradersRest\Value\Survey;

class CreateSurvey
{
    use MapFromArray;

    public function __construct(
        public CoolDown $cooldown,
        /**
         * @var Survey[] $surveys
         */
        public array $surveys,
    ) {
    }
}
