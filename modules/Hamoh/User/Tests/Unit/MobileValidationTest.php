<?php

namespace Hamoh\User\Tests\Unit;

use Hamoh\User\Rules\ValidMobile;
use PHPUnit\Framework\TestCase;

class MobileValidationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_mobile_can_not_be_less_than_9_chars()
    {
        $result = (new ValidMobile())->passes('','12312321');
        $this->assertEquals(0,$result);
    }
    public function test_mobile_can_not_be_more_than_14_chars()
    {
        $result = (new ValidMobile())->passes('','1234567891234567');
        $this->assertEquals(0,$result);
    }
}
