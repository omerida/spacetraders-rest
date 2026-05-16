<?php

namespace Phparch\SpaceTradersRest\Client;

use GuzzleHttp\Exception\ClientException;
use Phparch\SpaceTradersRest\APIException;
use Phparch\SpaceTradersRest\Client;
use Phparch\SpaceTradersRest\Value\Fleet\DockShip;
use Phparch\SpaceTradersRest\Value\Fleet\ExtractResources;
use Phparch\SpaceTradersRest\Value\Fleet\JettisonCargo;
use Phparch\SpaceTradersRest\Value\Fleet\ListShips;
use Phparch\SpaceTradersRest\Value\Fleet\NavigateShip;
use Phparch\SpaceTradersRest\Value\Fleet\OrbitShip;
use Phparch\SpaceTradersRest\Value\Fleet\PurchaseShip;
use Phparch\SpaceTradersRest\Value\Fleet\RefuelShip;
use Phparch\SpaceTradersRest\Value\Fleet\SellCargo;
use Phparch\SpaceTradersRest\Value\Fleet\ShipMounts;
use Phparch\SpaceTradersRest\Value\ScrapTransaction;
use Phparch\SpaceTradersRest\Value\Ship;
use Phparch\SpaceTradersRest\Value\Ship\CargoDetails;
use Phparch\SpaceTradersRest\Value\Ship\CoolDown;
use Phparch\SpaceTradersRest\Value\Waypoint;

/**
 * For endpoints under "fleet" group.
 * <https://spacetraders.stoplight.io/docs/spacetraders/>
 */
class Fleet extends Client
{
    public function listShips(): ListShips
    {
        try {
            return $this->convertResponse(
                $this->get('my/ships'),
                ListShips::class
            );
        } catch (ClientException $e) {
            $body = $e->getResponse()->getBody()->getContents();
            throw new APIException($body);
        }
    }

    public function getShip(string $ship): Ship
    {
        try {
            return $this->convertResponse(
                $this->get('my/ships/' . $ship),
                Ship::class
            );
        } catch (ClientException $e) {
            $body = $e->getResponse()->getBody()->getContents();
            throw new APIException($body);
        }
    }

    public function getShipCargo(string $ship): CargoDetails
    {
        try {
            return $this->convertResponse(
                $this->get('my/ships/' . $ship . '/cargo'),
                CargoDetails::class
            );
        } catch (ClientException $e) {
            $body = $e->getResponse()->getBody()->getContents();
            throw new APIException($body);
        }
    }

    public function getShipCooldown(string $ship): CoolDown
    {
        try {
            return $this->convertResponse(
                $this->get('my/ships/' . $ship . '/cooldown'),
                CoolDown::class
            );
        } catch (ClientException $e) {
            $body = $e->getResponse()->getBody()->getContents();
            throw new APIException($body);
        }
    }

    public function getShipMounts(string $ship): ShipMounts
    {
        try {
            return $this->convertResponse(
                $this->get('my/ships/' . $ship . '/mounts'),
                ShipMounts::class
            );
        } catch (ClientException $e) {
            $body = $e->getResponse()->getBody()->getContents();
            throw new APIException($body);
        }
    }

    public function getScrapShip(string $ship): ScrapTransaction
    {
        try {
            return $this->convertResponse(
                $this->get('my/ships/' . $ship . '/scrap'),
                ScrapTransaction::class
            );
        } catch (ClientException $e) {
            $body = $e->getResponse()->getBody()->getContents();
            throw new APIException($body);
        }
    }

    public function purchaseShip(
        Waypoint\Symbol $waypoint,
        string $type
    ): PurchaseShip {
        try {
            $response = $this->post(
                'my/ships',
                data: [
                    'waypointSymbol' => (string) $waypoint,
                    'shipType' => $type,
                ],
                authenticate: true
            );
            return $this->convertResponse(
                $response,
                PurchaseShip::class
            );
        } catch (ClientException $e) {
            $body = $e->getResponse()->getBody()->getContents();
            throw new APIException($body);
        }
    }
}
