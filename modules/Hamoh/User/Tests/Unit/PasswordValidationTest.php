<?php

namespace Hamoh\User\Tests\Unit;

use Hamoh\User\Rules\ValidPassword;
use PHPUnit\Framework\TestCase;

class PasswordValidationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_password_should_not_be_less_than_8_chars()
    {
        $result = (new ValidPassword())->passes('','Hm14567');
        $this->assertEquals(0,$result);
    }
    public function test_password_should_have_capital_letter()
    {
        $result = (new ValidPassword())->passes('','hamid12312312');
        $this->assertEquals(0,$result);
    }
    public function test_password_should_have_small_letter()
    {
        $result = (new ValidPassword())->passes('','GGGGGG12312312');
        $this->assertEquals(0,$result);
    }
    public function test_password_should_have_digits()
    {
        $result = (new ValidPassword())->passes('','Hamidrezahahah');
        $this->assertEquals(0,$result);
    }
}
