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

        $xmlFile = simplexml_load_file($file);

        if (isset($xmlFile->person)) {
            foreach ($xmlFile->children() as $xml) {
                $this->personStore($xml);
            }
        }

        if (isset($xmlFile->shiporder)) {
            foreach ($xmlFile->children() as $xml) {
                $this->shipOrderStore($xml);
            }
        }
    }

    public function personStore(SimpleXMLElement $xml)
    {
        $person = Person::create([
            'name' => (string) $xml->personname
        ]);

        foreach ($xml->phones->children() as $phone) {
            Phone::create([
                'number' => (string) $phone,
                'people_id' => $person->id
            ]);
        }
    }

    public function shipOrderStore(SimpleXMLElement $xml)
    {
        $shipOrder = ShipOrder::create([
            'people_id' => (string) $xml->orderperson,
            'shipto_name' => (string)  $xml->shipto->name,
            'shipto_address' => (string)  $xml->shipto->address,
            'shipto_city' => (string) $xml->shipto->city,
            'shipto_country' => (string)  $xml->shipto->country
        ]);

        foreach ($xml->items->children() as $item) {
            $x = Item::create([
                'title' => (string) $item->title,
                'note' => (string) $item->note,
                'quantity' => (string) $item->quantity,
                'price' => (string) $item->price,
                'ship_order_id' => (string) $shipOrder->id
            ]);
        }
    }
}
