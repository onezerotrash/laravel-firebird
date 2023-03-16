<?php

namespace onezerotrash\Firebird\Tests;

use onezerotrash\Firebird\Tests\Support\Factories\UserFactory;
use onezerotrash\Firebird\Tests\Support\MigrateDatabase;
use onezerotrash\Firebird\Tests\Support\Models\User;

class ModelTest extends TestCase
{
    use MigrateDatabase;

    /** @test */
    public function it_can_create_a_record()
    {
        User::create($fields = [
            'id' => $id = UserFactory::$id++, // Firebird < 3 does not support auto-incrementing columns.
            'name' => 'Anna',
            'email' => 'anna@example.com',
            'city' => 'Sydney',
            'state' => 'New South Wales',
            'post_code' => '2000',
            'country' => 'Australia',
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ]);

        $user = User::find($id);

        $this->assertInstanceOf(User::class, $user);

        // Check all fields have been persisted the model.
        foreach ($fields as $key => $value) {
            $this->assertEquals($value, $user->{$key});
        }
    }
}
