<?php

namespace Tests\Unit;

use App\Models\User;

use PHPUnit\Framework\TestCase;
use Illuminate\Http\Request;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    // public function testApplication()
    // {
    //     $user = factory(User::class)->create();

    //     $response = $this->actingAs($user)
    //                      ->withSession(['foo' => 'bar'])
    //                      ->get('dashboard');
    // }
}
