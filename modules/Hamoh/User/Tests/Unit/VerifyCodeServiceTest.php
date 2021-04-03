<?php


namespace Hamoh\User\Tests\Unit;



use Hamoh\User\Services\VerifyCodeService;
use Tests\TestCase;

class VerifyCodeServiceTest extends TestCase
{
    public function test_generated_code_is_6_digits()
    {
        $code = VerifyCodeService::generate();
        $this->assertIsNumeric($code);
        $this->assertLessThanOrEqual(999999,$code,'Generated code is less than 999999');
        $this->assertGreaterThanOrEqual(100000,$code,'Generated code is greater than 100000');
    }

    public function test_verify_code_can_store()
    {
        $code = VerifyCodeService::generate();
        VerifyCodeService::store(1,$code,now()->addDay());
        $this->assertEquals($code,cache()->get('verify_code_1'));
    }
}
