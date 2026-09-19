<?php

namespace Phparch\SpaceTradersRest\Client;

use GuzzleHttp\Exception\GuzzleException;
use Phparch\SpaceTradersRest\Client;
use Phparch\SpaceTradersRest\Event;
use Phparch\SpaceTradersRest\Exception\APIAuthentication;
use Phparch\SpaceTradersRest\Exception\APIFailure;
use Phparch\SpaceTradersRest\Value;
use Phparch\SpaceTradersRest\Value\Contract;
use Phparch\SpaceTradersRest\Value\Goods;

class Contracts extends Client
{
    /**
     * @throws APIAuthentication
     * @throws APIFailure
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function myContracts(): Value\Contracts
    {
        return $this->doGetAndConvert(
            path: 'my/contracts',
            responseClass: Value\Contracts::class
        );
    }

    /**
     * @throws APIAuthentication
     * @throws APIFailure
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function accept(string $id): Contract\Accept
    {
        $response = $this->doPostAndConvert(
            path: sprintf('my/contracts/%s/accept', $id),
            responseClass: Contract\Accept::class
        );

        if ($this->eventDispatcher && $response->contract->accepted) {
            $this->eventDispatcher->dispatch(
                new Event\ContractAccepted($response)
            );
        }

        return $response;
    }

    /**
     * @throws APIAuthentication
     * @throws APIFailure
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function details(string $id): Contract
    {
        return $this->doGetAndConvert(
            path: sprintf('my/contracts/%s', $id),
            responseClass: Contract::class
        );
    }

    public function deliverCargo(
        string $id,
        string $shipSymbol,
        Goods\Symbol $good,
        int $units
    ): Contract\DeliverCargo
    {
        $response =  $this->doPostAndConvert(
            path: sprintf('my/contracts/%s/deliver', $id),
            responseClass: Contract\DeliverCargo::class,
            data: [
                'shipSymbol' => $shipSymbol,
                'tradeSymbol' => $good->value,
                'units' => $units,
            ]
        );

        if ($this->eventDispatcher && $response->contract) {
            $this->eventDispatcher->dispatch(
                new Event\ContractCargoDelivered($response)
            );
        }

        return $response;
    }

    public function fulfill(string $id): Contract\Fulfill
    {
        $response = $this->doPostAndConvert(
            path: sprintf('my/contracts/%s/fulfill', $id),
            responseClass: Contract\Fulfill::class,
        );

        if ($this->eventDispatcher && $response->contract->fulfilled) {
            $this->eventDispatcher->dispatch(
                new Event\ContractFulfilled($response)
            );
        }

        return $response;
    }
}
