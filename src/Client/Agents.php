<?php

namespace Phparch\SpaceTradersRest\Client;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Phparch\SpaceTradersRest\APIException;
use Phparch\SpaceTradersRest\Client;
use Phparch\SpaceTradersRest\Value;

class Agents extends Client
{
    /**
     * @throws GuzzleException
     * @throws APIException
     * @throws \JsonException
     */
    public function myAgent(): Value\Agent
    {
        return $this->doGetAndConvert(
            path: 'my/agent',
            responseClass: Value\Agent::class
        );
    }

    #[\Deprecated]
    public function register(string $symbol, string $faction): Value\Register
    {
        if (!$this->isValidAgent($symbol)) {
            throw new \InvalidArgumentException("Invalid agent: $symbol");
        }

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
                Value\Register::class
            );
        } catch (ClientException $e) {
            $body = $e->getResponse()->getBody()->getContents();
            throw new APIException($body);
        }
    }

    /**
     * @throws GuzzleException
     * @throws APIException
     * @throws \JsonException
     */
    public function listAgents(): Value\Agents
    {
        return $this->doGetAndConvert(
            path: 'agents',
            responseClass: Value\Agents::class
        );
    }

    public function getAgentDetails(string $symbol): Value\Agent
    {
        if (!$this->isValidAgent($symbol)) {
            throw new \InvalidArgumentException("Invalid agent: $symbol");
        }

        return $this->doGetAndConvert(
            path: 'agents/' . $symbol,
            responseClass: Value\Agent::class
        );
    }

    protected function isValidAgent(string $agent): bool {
        if (preg_match("/^[a-zA-Z0-9-_]+$/", $agent)) {
            return true;
        }

        return false;
    }
}
