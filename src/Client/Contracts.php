<?php

namespace Phparch\SpaceTradersRest\Client;

use GuzzleHttp\Exception\GuzzleException;
use Phparch\SpaceTradersRest\Client;
use Phparch\SpaceTradersRest\Event\ContractAccepted;
use Phparch\SpaceTradersRest\Exception\APIAuthentication;
use Phparch\SpaceTradersRest\Exception\APIFailure;
use Phparch\SpaceTradersRest\Value;
use Phparch\SpaceTradersRest\Value\Contract;

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
                new ContractAccepted($response)
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
}
