<?php

namespace Tests\Unit;

use App\Item;
use App\Person;
use App\ShipOrder;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    /** @test */
    public function it_can_create_a_item_to_the_ship_order()
    {

        $person = new Person([
            'name' => 'Name'
        ]);

        $shipOrder = new ShipOrder([
            'shipto_name' => 'Name',
            'shipto_address' => 'Address',
            'shipto_city' => 'City',
            'shipto_country' => 'Country',
            'people_id' => $person->id,
        ]);

        $this->assertEquals('Name', $shipOrder->shipto_name);
        $this->assertEquals('Address', $shipOrder->shipto_address);
        $this->assertEquals('City', $shipOrder->shipto_city);
        $this->assertEquals('Country', $shipOrder->shipto_country);
        $this->assertEquals($person->id, $shipOrder->person_id);

        $item = new Item([
            'title' => 'Title',
            'note' => 'Note',
            'quantity' => 5,
            'price' => 5.55,
            'ship_order_id' => $shipOrder->id
        ]);

        $this->assertEquals('Title', $item->title);
        $this->assertEquals('Note', $item->note);
        $this->assertEquals(5, $item->quantity);
        $this->assertEquals(5.55, $item->price);
        $this->assertEquals($shipOrder->id, $item->ship_order_id);
    }
}
