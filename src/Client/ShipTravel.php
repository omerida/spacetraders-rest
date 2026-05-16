<?php

namespace Phparch\SpaceTradersRest\Client;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Phparch\SpaceTradersRest\APIException;
use Phparch\SpaceTradersRest\Client;
use Phparch\SpaceTradersRest\Value\Fleet;
use Phparch\SpaceTradersRest\Value\Ship;
use Phparch\SpaceTradersRest\Value\Waypoint;

class ShipTravel extends Client
{
    public function dockShip(string $ship): Fleet\DockShip
    {
        return $this->doPostAndConvert(
            path: 'my/ships/' . $ship . '/dock',
            responseClass: Fleet\DockShip::class
        );
    }

    public function jumpShip(string $ship): Fleet\JumpShip
    {
        return $this->doPostAndConvert(
            path: 'my/ships/' . $ship . '/jump',
            responseClass: Fleet\JumpShip::class
        );
    }

    public function navigateShip(
        string $ship,
        Waypoint\Symbol $waypointSymbol
    ): Fleet\NavigateShip {
        return $this->doPostAndConvert(
            path: 'my/ships/' . $ship . '/navigate',
            data: [
                    'waypointSymbol' => (string) $waypointSymbol,
                ],
            responseClass: Fleet\NavigateShip::class
        );
    }

    public function orbitShip(string $ship): Fleet\OrbitShip
    {
        return $this->doPostAndConvert(
            path: 'my/ships/' . $ship . '/orbit',
            responseClass: Fleet\OrbitShip::class
        );
    }

    public function getNav(string $ship): Ship\Nav {
        return $this->doGetAndConvert(
            path: 'my/ships/' . $ship . '/nav',
            responseClass: Ship\Nav::class
        );
    }
    /**
     * @throws GuzzleException
     * @throws APIException
     * @throws \JsonException
     */
    public function setNavMode(
        string $ship,
        string $flightMode
    ): Ship\NavPatch
    {
        try {
            $response = $this->patch(
                sprintf('my/ships/%s/nav', $ship),
                data: [
                'flightMode' => (string) $flightMode,
                ],
                authenticate: true
            );
            return $this->convertResponse(
                $response,
                Ship\NavPatch::class
            );
        } catch (ClientException $e) {
            $body = $e->getResponse()->getBody()->getContents();
            throw new APIException($body);
        }
    }

    public function warp(string $ship): Fleet\WarpShip
    {
        return $this->doPostAndConvert(
            path: 'my/ships/' . $ship . '/warp',
            responseClass: Fleet\WarpShip::class
        );
    }
}
