<?php declare(strict_types=1);

use \GuzzleHttp\Psr7;
use Phparch\SpaceTradersRest\Event\ContractAccepted;
use PHPUnit\Framework\TestCase;
use Psr\EventDispatcher\EventDispatcherInterface;
use Phparch\SpaceTradersRest\Client;

class ContractAcceptedEventTest extends TestCase
{
    public function testContractAcceptedEventEmitted(): void {
        // Stub the API response in Guzzle
        $guzzle = $this->createStub(\GuzzleHttp\Client::class);
        $guzzle->method('post')
            ->willReturn($this->getAcceptedResponse());

        // Create a mock event dispatcher
        $dispatcher = $this->createMock(EventDispatcherInterface::class);
        $dispatcher->expects($this->once())
            ->method('dispatch')
            ->with($this->isInstanceOf(ContractAccepted::class));

        // Do the client call
        $client = new Client\Contracts(
            token: "SECRET_TOKEN",
            guzzle: $guzzle,
            eventDispatcher: $dispatcher
        );
        $client->accept("FOO");
    }

    public function testContractNotAcceptedNoEventEmitted(): void {
        // Stub the API response in Guzzle
        $guzzle = $this->createStub(\GuzzleHttp\Client::class);
        $guzzle->method('post')
            ->willReturn($this->getNotAcceptedResponse());

        // Create a mock event dispatcher
        $dispatcher = $this->createMock(EventDispatcherInterface::class);
        $dispatcher->expects($this->never())
            ->method('dispatch')
            ->with($this->isInstanceOf(ContractAccepted::class));

        // Fake a client response
        $client = new Client\Contracts(
            token: "SECRET_TOKEN",
            guzzle: $guzzle,
            eventDispatcher: $dispatcher
        );
        $client->accept("FOO");
    }

    private function getAcceptedResponse(): Psr7\Response {
        $json = <<<JSON
{
  "data": {
    "contract": {
      "id": "string",
      "factionSymbol": "string",
      "type": "PROCUREMENT",
      "terms": {
        "deadline": "2026-07-09T03:51:24.696Z",
        "payment": {
          "onAccepted": 1,
          "onFulfilled": 1
        },
        "deliver": [
          {
            "tradeSymbol": "string",
            "destinationSymbol": "string",
            "unitsRequired": 1,
            "unitsFulfilled": 1
          }
        ]
      },
      "accepted": true,
      "fulfilled": false,
      "deadlineToAccept": "2026-07-09T03:51:24.696Z",
      "expiration": "2026-07-09T03:51:24.696Z"
    },
    "agent": {
      "accountId": "string",
      "symbol": "string",
      "headquarters": "X1-UQ87-A1",
      "credits": 1,
      "startingFaction": "COSMIC",
      "shipCount": 1
    }
  }
}
JSON;

        return new Psr7\Response(200, [], $json);
    }

    private function getNotAcceptedResponse(): Psr7\Response {
        $json = <<<JSON
{
  "data": {
    "contract": {
      "id": "string",
      "factionSymbol": "string",
      "type": "PROCUREMENT",
      "terms": {
        "deadline": "2026-07-09T03:51:24.696Z",
        "payment": {
          "onAccepted": 1,
          "onFulfilled": 1
        },
        "deliver": [
          {
            "tradeSymbol": "string",
            "destinationSymbol": "string",
            "unitsRequired": 1,
            "unitsFulfilled": 1
          }
        ]
      },
      "accepted": false,
      "fulfilled": false,
      "deadlineToAccept": "2026-07-09T03:51:24.696Z",
      "expiration": "2026-07-09T03:51:24.696Z"
    },
    "agent": {
      "accountId": "string",
      "symbol": "string",
      "headquarters": "X1-UQ87-A1",
      "credits": 1,
      "startingFaction": "COSMIC",
      "shipCount": 1
    }
  }
}
JSON;

        return new Psr7\Response(200, [], $json);
    }
}