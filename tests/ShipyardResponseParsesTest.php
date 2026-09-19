<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Phparch\SpaceTradersRest\Value\Shipyard;

class ShipyardResponseParsesTest extends TestCase
{
    public function testShipyardJSONParses(): void {
        $raw = file_get_contents(__DIR__ . '/data/shipyard.json');
        if ($raw === false) {
            throw new \RuntimeException("Could not read raw data");
        }
        $json = json_decode($raw, true, 512, JSON_THROW_ON_ERROR);
        $response = null;
        if ($json) {
            /**@phpstan-ignore offsetAccess.nonOffsetAccessible */
            assert(is_array($json['data']));
            $response = Shipyard::fromArray($json['data']);
        }
        $this->assertInstanceOf(Shipyard::class, $response);
    }
}
