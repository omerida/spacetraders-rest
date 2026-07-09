<?php declare(strict_types=1);

use \GuzzleHttp\Psr7;
use Phparch\SpaceTradersRest\Event\SystemMarketData;
use PHPUnit\Framework\TestCase;
use Psr\EventDispatcher\EventDispatcherInterface;
use Phparch\SpaceTradersRest\Client;

class MarketScannedEventTest extends TestCase
{
    public function testEventEmitted(): void {
        // Stub the API response in Guzzle
        $guzzle = $this->createStub(\GuzzleHttp\Client::class);
        $guzzle->method('get')
            ->willReturn($this->getMarketResponse());

        // Create a mock event dispatcher
        $dispatcher = $this->createMock(EventDispatcherInterface::class);
        $dispatcher->expects($this->once())
            ->method('dispatch')
            ->with($this->isInstanceOf(SystemMarketData::class));

        // Do the client call
        $client = new Client\Systems(
            token: "SECRET_TOKEN",
            guzzle: $guzzle,
            eventDispatcher: $dispatcher
        );
        $client->market("foo", "bar");
    }

    private function getMarketResponse(): Psr7\Response {
        $json = <<<JSON
{
  "data": {
    "symbol": "X1-UQ87-A1",
    "exports": [
      {
        "symbol": "PRECIOUS_STONES",
        "name": "string",
        "description": "string"
      }
    ],
    "imports": [
      {
        "symbol": "PRECIOUS_STONES",
        "name": "string",
        "description": "string"
      }
    ],
    "exchange": [
      {
        "symbol": "PRECIOUS_STONES",
        "name": "string",
        "description": "string"
      }
    ],
    "transactions": [
      {
        "waypointSymbol": "X1-UQ87-A1",
        "shipSymbol": "string",
        "tradeSymbol": "PRECIOUS_STONES",
        "type": "PURCHASE",
        "units": 1,
        "pricePerUnit": 1,
        "totalPrice": 1,
        "timestamp": "2026-07-09T03:51:24.696Z"
      }
    ],
    "tradeGoods": [
      {
        "symbol": "PRECIOUS_STONES",
        "type": "EXPORT",
        "tradeVolume": 1,
        "supply": "SCARCE",
        "activity": "WEAK",
        "purchasePrice": 1,
        "sellPrice": 1
      }
    ]
  }
}
JSON;

        return new Psr7\Response(200, [], $json);
    }
}