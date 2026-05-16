<?php

namespace Phparch\SpaceTradersRest\Client;

use Phparch\SpaceTradersRest\Client;
use Phparch\SpaceTradersRest\Value\Fleet\ExtractResources;
use Phparch\SpaceTradersRest\Value\Fleet\JettisonCargo;
use Phparch\SpaceTradersRest\Value\Fleet\RefuelShip;
use Phparch\SpaceTradersRest\Value\Fleet\SellCargo;
use Phparch\SpaceTradersRest\Value\Goods;
use Phparch\SpaceTradersRest\Value\CreateChart;

class ShipActions extends Client
{
    public function createChart(string $ship): CreateChart {
        return $this->doPostAndConvert(
            path: 'my/ships/' . $ship . '/chart',
            responseClass: CreateChart::class,
        );
    }

    /**
     * @throws \RuntimeException
     */
    public function extractResources(string $ship): ExtractResources
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
}
