<?php

namespace Tests\Unit;

use App\Person;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    /** @test */
    public function it_can_create_a_person()
    {
        $person = new Person([
            'name' => 'Name'
        ]);

        $this->assertEquals('Name', $person->name);
    }
}
