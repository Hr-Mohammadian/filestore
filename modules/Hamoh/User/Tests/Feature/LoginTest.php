<?php

namespace Hamoh\User\Tests\Feature;

use Hamoh\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use withFaker;
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_login_by_email()
    {
        $user = User::create(
            [
                'name' => $this->faker->name,
                'email' => $this->faker->safeEmail,
                'mobile' => '1231231233',
                'password' => bcrypt('Hamid123123')
            ]
        );
        $this->post(route('login'),[
            'email' => $user->email,
            'password' => 'Hamid123123'
        ]);
        $this->assertAuthenticated();

    }
    public function test_user_can_login_by_mobile()
    {
        $user = User::create(
            [
                'name' => $this->faker->name,
                'email' => $this->faker->safeEmail,
                'mobile' => '1231231233',
                'password' => bcrypt('Hamid123123')
            ]
        );
        $this->post(route('login'),[
            'email' => $user->mobile,
            'password' => 'Hamid123123'
        ]);
        $this->assertAuthenticated();

    }

}
