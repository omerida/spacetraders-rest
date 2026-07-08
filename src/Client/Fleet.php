<?php

namespace Phparch\SpaceTradersRest\Client;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Phparch\SpaceTradersRest\Client;
use Phparch\SpaceTradersRest\Exception\APIAuthentication;
use Phparch\SpaceTradersRest\Exception\APIFailure;
use Phparch\SpaceTradersRest\Value\Fleet\ListShips;
use Phparch\SpaceTradersRest\Value\Fleet\PurchaseShip;
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
        return $this->doGetAndConvert(
            path: 'my/ships',
            responseClass: ListShips::class
        );
    }

    /**
     * @throws APIAuthentication
     * @throws APIFailure
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function getShip(string $ship): Ship
    {
        return $this->doGetAndConvert(
            path: 'my/ships/' . $ship,
            responseClass: Ship::class
        );
    }

    /**
     * @throws APIAuthentication
     * @throws APIFailure
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function getShipCargo(string $ship): CargoDetails
    {
        return $this->doGetAndConvert(
            path: 'my/ships/' . $ship . '/cargo',
            responseClass: CargoDetails::class
        );
    }

    /**
     * @throws APIAuthentication
     * @throws APIFailure
     * @throws GuzzleException

     * @throws \JsonException
     */
    public function getShipCooldown(string $ship): CoolDown
    {
        return $this->doGetAndConvert(
            path: 'my/ships/' . $ship . '/cooldown',
            responseClass: CoolDown::class
        );
    }

    /**
     * @throws APIAuthentication
     * @throws APIFailure
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function getShipMounts(string $ship): ShipMounts
    {
        return $this->doGetAndConvert(
            path: 'my/ships/' . $ship . '/mounts',
            responseClass:  ShipMounts::class
        );
    }

    /**
     * @throws APIAuthentication
     * @throws APIFailure
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function getScrapShip(string $ship): ScrapTransaction
    {
        return $this->doGetAndConvert(
            path: 'my/ships/' . $ship . '/scrap',
            responseClass: ScrapTransaction::class
        );
    }

    /**
     * @throws APIAuthentication
     * @throws APIFailure
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function purchaseShip(
        Waypoint\Symbol $waypoint,
        string $type
    ): PurchaseShip {

        return $this->doPostAndConvert(
            path: 'my/ships',
            responseClass: PurchaseShip::class,
            data: [
                    'waypointSymbol' => (string) $waypoint,
                    'shipType' => $type,
                ],
            authenticate: true
        );
    }
}
