<?php

namespace Phparch\SpaceTradersRest\Client;

use CuyZ\Valinor\Mapper\MappingError;
use GuzzleHttp\Exception\GuzzleException;
use Phparch\SpaceTradersRest\Event\CargoSold;
use Phparch\SpaceTradersRest\Exception\APIAuthentication;
use Phparch\SpaceTradersRest\Exception\APIFailure;
use Phparch\SpaceTradersRest\Client;
use Phparch\SpaceTradersRest\Value\CreateChart;
use Phparch\SpaceTradersRest\Value\Fleet;
use Phparch\SpaceTradersRest\Value\Goods;
use Phparch\SpaceTradersRest\Value\Survey;

class ShipActions extends Client
{
    /**
     * @throws GuzzleException
     * @throws \JsonException
     * @throws APIFailure|APIAuthentication
 */
    public function createChart(string $ship): CreateChart {
        return $this->doPostAndConvert(
            path: 'my/ships/' . $ship . '/chart',
            responseClass: CreateChart::class,
        );
    }

    /**
     * @throws APIAuthentication
     * @throws APIFailure
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function extractResources(string $ship): Fleet\ExtractResources
    {
        return $this->doPostAndConvert(
            path: 'my/ships/' . $ship . '/extract',
            responseClass: Fleet\ExtractResources::class
        );
    }

    /**
     * @throws APIAuthentication
     * @throws APIFailure
     * @throws GuzzleException
     * @throws MappingError
     * @throws \JsonException
     */
    public function extractResourcesWithSurvey(
        string $ship,
        Survey $survey
    ): Fleet\ExtractResources
    {
        $data = $survey->toArray();
        if (!is_array($data)) {
            throw new \RuntimeException('Survey data should be an array');
        }

        /** @var array<string, mixed> $normalizedData */
        $normalizedData = $data;
        return $this->doPostAndConvert(
            path: 'my/ships/' . $ship . '/extract/survey',
            responseClass: Fleet\ExtractResources::class,
            data: $normalizedData
        );
    }

    /**
     * @throws APIAuthentication
     * @throws APIFailure
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function jettisonCargo(
        string $ship,
        string $cargo,
        ?int $units = null,
    ): Fleet\JettisonCargo
    {
        $data = [];
        // Validate trade good
        $tradegood = Goods\Symbol::from($cargo);

        $data['symbol'] = $tradegood->value;
        $data['units'] = $units;

        return $this->doPostAndConvert(
            path: 'my/ships/' . $ship . '/jettison',
            responseClass: Fleet\JettisonCargo::class,
            data: $data
        );
    }

    /**
     * @throws APIAuthentication
     * @throws APIFailure
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function refuelShip(
        string $ship,
        ?int $units = null,
        bool $fromCargo = false
    ): Fleet\RefuelShip {
        $data = [];
        $data['fromCargo'] = $fromCargo;
        if ($units > 0) {
            $data['units'] = $units;
        }

        return $this->doPostAndConvert(
            path: 'my/ships/' . $ship . '/refuel',
            responseClass: Fleet\RefuelShip::class,
            data: $data,
        );
    }

    /**
     * @throws APIAuthentication
     * @throws APIFailure
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function sellCargo(
        string $ship,
        string $cargo,
        ?int $units = null,
    ): Fleet\SellCargo
    {
        $data = [];
        // Validate trade good
        $tradegood = Goods\Symbol::from($cargo);

        $data['symbol'] = $tradegood->value;
        $data['units'] = $units;

        $response = $this->doPostAndConvert(
            path: 'my/ships/' . $ship . '/sell',
            responseClass: Fleet\SellCargo::class,
            data: $data
        );

        if ($this->eventDispatcher && $response->transaction) {
            $this->eventDispatcher->dispatch(
                new CargoSold($response)
            );
        }

        return $response;
    }

    /**
     * @throws GuzzleException
     * @throws \JsonException
     * @throws APIFailure|APIAuthentication
     */
    public function createSurvey(string $ship): Fleet\CreateSurvey {
        return $this->doPostAndConvert(
            path: 'my/ships/' . $ship . '/survey',
            responseClass: Fleet\CreateSurvey::class,
        );
    }

    /**
     * @throws GuzzleException
     * @throws APIFailure|APIAuthentication
     * @throws \JsonException
     */
    public function siphonResources(string $ship): Fleet\SiphonResources
    {
        return $this->doPostAndConvert(
            path: 'my/ships/' . $ship . '/siphon',
            responseClass: Fleet\SiphonResources::class
        );
    }
}
