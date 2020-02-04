<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ImportFileXMLTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_upload_xml_files_and_import_database()
    {
        $file = new UploadedFile('public/testes/people.xml', 'people.xml', 'application/xml');

        $this->postJson('/xml/store', [
            'file' => $file
        ])->assertStatus(200);

        $file = new UploadedFile('public/testes/shiporders.xml', 'shiporders.xml', 'application/xml');
        $this->postJson('/xml/store', [
            'file' => $file
        ])->assertStatus(200);

        $this->assertDatabaseHas('people', [
            'name' => 'Name 3'
        ]);

        $this->assertDatabaseHas('phones', [
            'number' => '7777777',
            'people_id' => 3
        ]);

        $this->assertDatabaseHas('phones', [
            'number' => '8888888',
            'people_id' => 3
        ]);

        $this->assertDatabaseHas('ship_orders', [
            'shipto_name' => 'Name 3'
        ]);

        $this->assertDatabaseHas('items', [
            'title' => 'Title 3',
            'ship_order_id' => 3
        ]);


    }
}
