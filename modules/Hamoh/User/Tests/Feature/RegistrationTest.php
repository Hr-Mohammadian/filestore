<?php

namespace Hamoh\User\Tests\Feature;

use Hamoh\User\Models\User;
use Hamoh\User\Services\VerifyCodeService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class RegistrationTest extends TestCase
{   use RefreshDatabase;
    use withFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_see_register_form()
    {
        $response = $this->get(route('register'));
        $response->assertStatus(200);
    }

    public function test_user_can_register()
    {
        $this->withoutExceptionHandling();
        $response = $this->post(route('register'),[
            'name' => 'hamid',
            'email' => 'har@gmail.com',
            'mobile' => '12312312312',
            'password' => 'Hamid123123',
            'password_confirmation' => 'Hamid123123'
        ]);
//        $response->assertOk();
//        auth()->user()->markEmailAsVerified();
        $response->assertRedirect(route('home'));
        $this->assertCount(1,User::all());
    }


    public function test_user_has_to_verify_account()
    {
        $this->withoutExceptionHandling();
        $this->registerNewUser();
        $response = $this->get(route('home'));
        $response->assertRedirect(route('verification.notice'));
    }

    public function test_user_can_verify_account()
    {
        $user = User::create(
            [
                'name' => $this->faker->name,
                'email' => $this->faker->safeEmail,
                'mobile' => '1231231233',
                'password' => bcrypt('Hamid123123')
            ]
        );
        $code = VerifyCodeService::generate();
        VerifyCodeService::store($user->id,$code,now()->addDay());
        auth()->loginUsingId($user->id);
        $this->assertAuthenticated();
        $this->post(route('verification.verify'),[
            'verify_code' => $code
        ]);
        $this->assertEquals(true,$user->fresh()->hasVerifiedEmail());

    }

    public function test_verified_user_can_see_homepage()
    {
        $this->withoutExceptionHandling();
        $this->registerNewUser();
        $this->assertAuthenticated();
        auth()->user()->markEmailAsVerified();
        $response = $this->get(route('home'));
        $response->assertOk();

    }

    public function registerNewUser()
    {
        $this->post(route('register'), [
            'name' => 'hamid',
            'email' => 'har@gmail.com',
            'mobile' => '12312312312',
            'password' => 'Hamid123123',
            'password_confirmation' => 'Hamid123123'
        ]);
    }

}
