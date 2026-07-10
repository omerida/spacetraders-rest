<?php declare(strict_types=1);

use GuzzleHttp\Psr7;
use Phparch\SpaceTradersRest\Event\CargoSold;
use PHPUnit\Framework\TestCase;
use Psr\EventDispatcher\EventDispatcherInterface;
use Phparch\SpaceTradersRest\Client;

class CargoSoldEventTest extends TestCase
{
    public function testEventEmitted(): void {
        // Stub the API response in Guzzle
        $guzzle = $this->createStub(\GuzzleHttp\Client::class);
        $guzzle->method('post')
            ->willReturn($this->getCargoSoldResponse());

        // Create a mock event dispatcher
        $dispatcher = $this->createMock(EventDispatcherInterface::class);
        $dispatcher->expects($this->once())
            ->method('dispatch')
            ->with($this->isInstanceOf(CargoSold::class));

        // Do the client call
        $client = new Client\ShipActions(
            token: "SECRET_TOKEN",
            guzzle: $guzzle,
            eventDispatcher: $dispatcher
        );
        $client->sellCargo("foo", "PRECIOUS_STONES", 10);
    }

    private function getCargoSoldResponse(): Psr7\Response {
        $json = <<<JSON
{
  "data": {
    "cargo": {
      "capacity": 1,
      "units": 1,
      "inventory": [
        {
          "symbol": "PRECIOUS_STONES",
          "name": "string",
          "description": "string",
          "units": 1
        }
      ]
    },
    "transaction": {
      "waypointSymbol": "X1-UQ87-A1",
      "shipSymbol": "string",
      "tradeSymbol": "PRECIOUS_STONES",
      "type": "PURCHASE",
      "units": 1,
      "pricePerUnit": 1,
      "totalPrice": 1,
      "timestamp": "2026-07-09T03:51:24.696Z"
    },
    "agent": {
      "accountId": "string",
      "symbol": "string",
      "headquarters": "X1-UQ87-A1",
      "credits": 1,
      "startingFaction": "string",
      "shipCount": 1
    }
  }
}
JSON;

        return new Psr7\Response(200, [], $json);
    }
}