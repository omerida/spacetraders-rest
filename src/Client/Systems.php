<?php

namespace Phparch\SpaceTradersRest\Client;

use GuzzleHttp\Exception\ClientException;
use Phparch\SpaceTradersRest\APIException;
use Phparch\SpaceTradersRest\Exception\APIAuthentication;
use Phparch\SpaceTradersRest\Exception\APIFailure;
use Phparch\SpaceTradersRest\Value;

class Systems extends \Phparch\SpaceTradersRest\Client
{
    public function construction(string $system, string $waypoint): Value\Construction
    {
        return $this->doGetAndConvert(
            sprintf('systems/%s/waypoints/%s/construction', $system, $waypoint),
            Value\Construction::class
        );
    }

    public function jumpGate(string $system, string $waypoint): Value\JumpGate
    {
        return $this->doGetAndConvert(
            sprintf('systems/%s/waypoints/%s/jump-gate', $system, $waypoint),
            Value\JumpGate::class
        );
    }

    public function market(string $system, string $waypoint): Value\Market
    {
        return $this->doGetAndConvert(
            sprintf('systems/%s/waypoints/%s/market', $system, $waypoint),
            responseClass: Value\Market::class
        );
    }

    public function shipyard(string $system, string $waypoint): Value\Shipyard
    {
        return $this->doGetAndConvert(
            sprintf('systems/%s/waypoints/%s/shipyard', $system, $waypoint),
            responseClass: Value\Shipyard::class
        );
    }

    public function supplyConstructionSite(
        string $system,
        string $waypoint,
        string $shipSymbol,
        Value\Goods\Symbol $tradeSymbol,
        int $units,
    ): Value\SuppliedConstructionSite {
        $url = 'systems/' . $system
        . '/waypoints/' . $waypoint
        . '/construction/supply';

        $body = [
            'shipSymbol' => $shipSymbol,
            'tradeSymbol' => $tradeSymbol,
            'units' => $units,
        ];

        return $this->convertResponse(
            $this->post($url, $body),
            Value\SuppliedConstructionSite::class
        );
    }

    public function system(string $systemSymbol): Value\System {
        return $this->doGetAndConvert(
            'systems/' . $systemSymbol,
            responseClass: Value\System::class
        );
    }

    /**
     * @throws APIAuthentication
     * @throws \JsonException
     * @throws APIFailure
     */
    public function systems(): Value\Systems {
        $default = [
            'page' => 1,
            'limit' => 20,
        ];

        try {
            $url  = 'systems?' . http_build_query($default);
            $response = $this->getAllPages($url, limit: $default['limit']);
            return $this->convertResponse(
                $response,
                Value\Systems::class
            );
        } catch (ClientException $e) {
            $body = $e->getResponse()->getBody()->getContents();
            if ($e->getCode() >= 500) {
                throw new APIFailure($body);
            }

            if ($e->getCode() >= 400) {
                throw new APIAuthentication($body);
            }

            throw $e;
        }
    }


    public function systemLocation(string $system, string $waypoint): Value\Waypoint
    {
        return $this->doGetAndConvert(
            sprintf('systems/%s/waypoints/%s', $system, $waypoint),
            Value\Waypoint::class
        );
    }

    /**
     * @param array{}|array{
     *     'limit'?: int,
     *     'page'?: int,
     *     'traits'?: string,
     *     'type'?:value-of<\Phparch\SpaceTradersRest\Value\Waypoint\Type>
     * } $queryParams
     * @throws APIFailure
     * @throws APIAuthentication
     */
    public function waypoints(string $system, array $queryParams = []): Value\Waypoints
    {
        $default = [
            'page' => 1,
            'limit' => 20,
        ];

        try {
            $queryParams = array_merge($default, $queryParams);
            $url = sprintf('systems/%s/waypoints', $system);
            if ($queryParams) {
                $url .= '?' . http_build_query($queryParams);
            }
            $response = $this->getAllPages($url, limit: $queryParams['limit']);
            return $this->convertResponse($response, Value\Waypoints::class);
        } catch (ClientException $e) {
            $body = $e->getResponse()->getBody()->getContents();
            if ($e->getCode() >= 500) {
                throw new APIFailure($body);
            }

            if ($e->getCode() >= 400) {
                throw new APIAuthentication($body);
            }

            throw $e;
        }
    }
}
