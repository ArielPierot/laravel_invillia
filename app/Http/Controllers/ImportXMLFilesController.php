<?php

namespace App\Http\Controllers;

use App\Item;
use App\Person;
use App\Phone;
use App\ShipOrder;
use Illuminate\Http\Request;
use SimpleXMLElement;

class ImportXMLFilesController extends Controller
{
    public function create()
    {
        return view('xml_files.create');
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $xmlFile = (array) new SimpleXMLElement($file, null, true);

        if (isset($xmlFile['person'])) {
            foreach ($xmlFile['person'] as $xml) {
                $xml = (array)$xml;
                $this->personStore($xml);
            }
        }

        if (isset($xmlFile['shiporder'])) {
            foreach ($xmlFile['shiporder'] as $xml) {
                $xml = (array) $xml;
                $this->shipOrderStore($xml);
            }
        }
    }

    public function personStore(array $xml)
    {
        $person = Person::create([
            'name' => $xml['personname']
        ]);

        $xmlPhones = (array)$xml['phones'];
        $phones = (array) array_shift($xmlPhones);

        foreach ($phones as $phone) {
            Phone::create([
                'number' => $phone,
                'people_id' => $person->id
            ]);
        }
    }

    public function shipOrderStore(array $xml)
    {
        $shipto = (array) $xml['shipto'];

        $shipOrder = ShipOrder::create([
            'people_id' => $xml['orderperson'],
            'shipto_name' => $shipto['name'],
            'shipto_address' => $shipto['address'],
            'shipto_city' => $shipto['city'],
            'shipto_country' => $shipto['country']
        ]);

        $xmlItems = (array) $xml['items'];

        foreach ($xmlItems as $item) {
            $item = (array) $item;

            if (isset($item['title'])) {
                Item::create([
                    'title' => $item['title'],
                    'note' => $item['note'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'ship_order_id' => $shipOrder->id
                ]);
            } else {
                foreach ($item as $itemOrder) {
                    $itemOrder = (array) $itemOrder;

                    Item::create([
                        'title' => $itemOrder['title'],
                        'note' => $itemOrder['note'],
                        'quantity' => $itemOrder['quantity'],
                        'price' => $itemOrder['price'],
                        'ship_order_id' => $shipOrder->id
                    ]);
                }
            }
        }
    }
}
