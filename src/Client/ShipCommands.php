<?php

namespace Phparch\SpaceTradersRest\Client;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Phparch\SpaceTradersRest\APIException;
use Phparch\SpaceTradersRest\Client;
use Phparch\SpaceTradersRest\Value\Fleet\DockShip;
use Phparch\SpaceTradersRest\Value\Fleet\ExtractResources;
use Phparch\SpaceTradersRest\Value\Fleet\JettisonCargo;
use Phparch\SpaceTradersRest\Value\Fleet\NavigateShip;
use Phparch\SpaceTradersRest\Value\Fleet\OrbitShip;
use Phparch\SpaceTradersRest\Value\Fleet\RefuelShip;
use Phparch\SpaceTradersRest\Value\Fleet\SellCargo;
use Phparch\SpaceTradersRest\Value\Goods;
use Phparch\SpaceTradersRest\Value\Ship\NavPatch;
use Phparch\SpaceTradersRest\Value\Waypoint;


Class ShipCommands extends Client
{
    public function dockShip(string $ship): DockShip
    {
        return $this->doPostAndConvert(
            path: 'my/ships/' . $ship . '/dock',
            responseClass: DockShip::class
        );
    }

    /**
     * @throws \RuntimeException
     */
    public function extractShip(string $ship): ExtractResources
    {
        return $this->doPostAndConvert(
            path: 'my/ships/' . $ship . '/extract',
            responseClass: ExtractResources::class
        );
    }

    public function jettisonCargo(
        string $ship,
        string $cargo,
        ?int $units = null,
    ): JettisonCargo
    {
        $data = [];
        // Validate trade good
        $tradegood = Goods\Symbol::from($cargo);

        $data['symbol'] = $tradegood->value;
        $data['units'] = $units;

        return $this->doPostAndConvert(
            path: 'my/ships/' . $ship . '/jettison',
            data: $data,
            responseClass: JettisonCargo::class
        );
    }

    public function navigateShip(
        string $ship,
        Waypoint\Symbol $waypointSymbol
    ): NavigateShip {
        return $this->doPostAndConvert(
            path: 'my/ships/' . $ship . '/navigate',
            data: [
                    'waypointSymbol' => (string) $waypointSymbol,
                ],
            responseClass: NavigateShip::class
        );
    }

    public function orbitShip(string $ship): OrbitShip
    {
        return $this->doPostAndConvert(
            path: 'my/ships/' . $ship . '/orbit',
            responseClass: OrbitShip::class
        );
    }

    public function refuelShip(
        string $ship,
        ?int $units = null,
        bool $fromCargo = false
    ): RefuelShip {
        $data = [];
        $data['fromCargo'] = $fromCargo;
        if ($units > 0) {
            $data['units'] = $units;
        }

        return $this->doPostAndConvert(
            path: 'my/ships/' . $ship . '/refuel',
            data: $data,
            responseClass: RefuelShip::class
        );
    }

    public function sellCargo(
        string $ship,
        string $cargo,
        ?int $units = null,
    ): SellCargo
    {
        $data = [];
        // Validate trade good
        $tradegood = Goods\Symbol::from($cargo);

        $data['symbol'] = $tradegood->value;
        $data['units'] = $units;

        return $this->doPostAndConvert(
            path: 'my/ships/' . $ship . '/sell',
            data: $data,
            responseClass: SellCargo::class
        );
    }
    /**
     * @throws GuzzleException
     * @throws APIException
     * @throws \JsonException
     */
    public function setNavMode(string $ship, string $flightMode): NavPatch
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
                NavPatch::class
            );
        } catch (ClientException $e) {
            $body = $e->getResponse()->getBody()->getContents();
            throw new APIException($body);
        }
    }
}