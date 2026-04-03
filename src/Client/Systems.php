<?php

namespace Phparch\SpaceTradersRest\Client;

use Phparch\SpaceTradersRest\Response;
use Phparch\SpaceTradersRest\Value;

class Systems extends \Phparch\SpaceTradersRest\Client
{
    public function market(string $system, string $waypoint): Value\Market
    {
        $response = $this->get(
            sprintf('systems/%s/waypoints/%s/market', $system, $waypoint)
        );

        return $this->convertResponse(
            $response,
            responseClass: Value\Market::class
        );
    }

    public function shipyard(string $system, string $waypoint): Value\Shipyard
    {
        $response = $this->get(
            sprintf('systems/%s/waypoints/%s/shipyard', $system, $waypoint)
        );

        return $this->convertResponse($response, Value\Shipyard::class);
    }

    public function systemLocation(string $system, string $waypoint): Value\Waypoint
    {
        $response = $this->get(
            sprintf('systems/%s/waypoints/%s', $system, $waypoint)
        );

        return $this->convertResponse($response, Value\Waypoint::class);
    }

    /**
     * @param array{}|array{
     *     'limit'?: int,
     *     'page'?: int,
     *     'traits'?: string,
     *     'type'?:value-of<\Phparch\SpaceTradersRest\Value\Waypoint\Type>
     * } $queryParams
     */
    public function waypoints(string $system, array $queryParams = []): Value\Waypoints
    {
        $default = [
            'page' => 1,
            'limit' => 20,
        ];

        $queryParams = array_merge($default, $queryParams);
        $url = sprintf('systems/%s/waypoints', $system);
        if ($queryParams) {
            $url .= '?' . http_build_query($queryParams);
        }
        $response = $this->getAllPages($url, limit: $queryParams['limit']);
        return $this->convertResponse($response, Value\Waypoints::class);
    }
}
