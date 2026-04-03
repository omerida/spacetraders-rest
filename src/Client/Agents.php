<?php

namespace Phparch\SpaceTradersRest\Client;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Phparch\SpaceTradersRest\APIException;
use Phparch\SpaceTradersRest\Client;
use Phparch\SpaceTradersRest\Response;
use Phparch\SpaceTradersRest\Value\Agent;
use Phparch\SpaceTradersRest\Value\Register;

class Agents extends Client
{
    /**
     * @throws GuzzleException
     * @throws APIException
     * @throws \JsonException
     */
    public function myAgent(): Agent
    {
        try {
            return $this->convertResponse(
                $this->get('my/agent'),
                Agent::class
            );
        } catch (ClientException $e) {
            $body = $e->getResponse()->getBody()->getContents();
            throw new APIException($body);
        }
    }

    #[\Deprecated]
    public function register(string $symbol, string $faction): Register
    {
        try {
            $response = $this->post(
                'register',
                data: [
                    'symbol' => $symbol,
                    'faction' => $faction
                ],
                authenticate: true
            );

            return $this->convertResponse(
                $response,
                Register::class
            );
        } catch (ClientException $e) {
            $body = $e->getResponse()->getBody()->getContents();
            throw new APIException($body);
        }
    }
}
