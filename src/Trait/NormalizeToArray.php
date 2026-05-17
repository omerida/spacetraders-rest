<?php

namespace Phparch\SpaceTradersRest\Trait;

use CuyZ\Valinor;

trait NormalizeToArray
{
    /**
     * @return array<mixed>|bool|float|int|string|null
     * @throws Valinor\Mapper\MappingError
     */
    public function toArray(): mixed
    {
        return (new Valinor\NormalizerBuilder())
            ->normalizer(Valinor\Normalizer\Format::array())
            ->normalize($this);
    }
}
