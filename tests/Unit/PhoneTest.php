<?php

namespace Tests\Unit;

use App\Person;
use App\Phone;
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{
    /** @test */
    public function it_can_create_a_phone_to_the_user()
    {
        $person = new Person([
            'name' => 'Name'
        ]);

        $this->assertEquals('Name', $person->name);

        $phone = new Phone([
            'number' => '33333',
            'people_id' => $person->id
        ]);

        $this->assertEquals('33333', $phone->number);
        $this->assertEquals($person->id, $phone->people_id);
    }
}
