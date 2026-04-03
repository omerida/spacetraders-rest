<?php

namespace Phparch\SpaceTradersRest\Client;

use Phparch\SpaceTradersRest\Client;
use Phparch\SpaceTradersRest\Value;
use Phparch\SpaceTradersRest\Value\Contract;

class Contracts extends Client
{
    public function myContracts(): Value\Contracts
    {
        return $this->convertResponse(
            $this->get('my/contracts'),
            Value\Contracts::class
        );
    }

    public function accept(string $id): Contract\Accept
    {
        $url = sprintf('my/contracts/%s/accept', $id);

        return $this->convertResponse(
            $this->post($url),
            Contract\Accept::class
        );
    }

    public function details(string $id): Contract
    {
        $url = sprintf('my/contracts/%s', $id);

        return $this->convertResponse(
            $this->get($url),
            Contract::class,
        );
    }
}
