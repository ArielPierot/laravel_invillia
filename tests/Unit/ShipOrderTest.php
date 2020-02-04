<?php

namespace Tests\Unit;

use App\ShipOrder;
use PHPUnit\Framework\TestCase;

class ShipOrderTest extends TestCase
{
    /** @test */
    public function it_can_create_a_ship_order()
    {
        $shipOrder = new ShipOrder([
            'shipto_name' => 'Name',
            'shipto_address' => 'Address',
            'shipto_city' => 'City',
            'shipto_country' => 'Country'
        ]);

        $this->assertEquals('Name', $shipOrder->shipto_name);
        $this->assertEquals('Address', $shipOrder->shipto_address);
        $this->assertEquals('City', $shipOrder->shipto_city);
        $this->assertEquals('Country', $shipOrder->shipto_country);
    }
}
