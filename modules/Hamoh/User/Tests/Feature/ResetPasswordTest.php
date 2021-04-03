<?php

namespace Hamoh\User\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class ResetPasswordTest extends TestCase
{   use RefreshDatabase;
    use withFaker;

    public function test_user_can_see_reset_password_request_form()
    {
     $response = $this->get(route('password.request'));
     $response->assertOk();
    }
    public function test_user_can_see_enter_verify_code_form_by_correct_email()
    {
        $this->call('get',route('password.sendVerifyCodeEmail'),['email' => 'dr.a3del@gmail.com'])
            ->assertOk();
    }
    public function test_user_can_not_see_enter_verify_code_form_by_incorrect_email()
    {
        $this->call('get',route('password.sendVerifyCodeEmail'),['email' => 'dr.a3delcom'])
            ->assertStatus(302);
    }

    public function test_user_banned_after_6_attempts_to_reset_password()
    {
        for ($i = 0;$i<5;$i++){
            $this->post(route('password.checkVerifyCode'),['verify_code','email'=>'dr.a3del@gmail.com'])
            ->assertStatus(302);
        }
        $this->post(route('password.checkVerifyCode'),['verify_code','email'=>'dr.a3del@gmail.com'])
            ->assertStatus(429);
    }


}
