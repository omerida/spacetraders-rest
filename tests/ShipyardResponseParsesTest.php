<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Phparch\SpaceTradersRest\Value\Shipyard;

class ShipyardResponseParsesTest extends TestCase
{
    public function testShipyardJSONParses(): void {
        $raw = file_get_contents(__DIR__ . '/data/shipyard.json');
        $json = json_decode($raw, true, 512, JSON_THROW_ON_ERROR);
        $response = Shipyard::fromArray($json['data']);
        $this->assertInstanceOf(Shipyard::class, $response);
    }
}
