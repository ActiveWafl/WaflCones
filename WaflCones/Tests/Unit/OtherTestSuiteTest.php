<?php

namespace WaflCones\Tests\Unit;

class OtherTestSuite
extends \Wafl\Extensions\PhpUnit\TestCase
implements \DblEj\UnitTesting\ITestCase
{

    public function Get_TestType()
    {
        return TestCase::UNIT_TEST;
    }

    public function GetHumanReadableTestType()
    {
        return "Unit Test";
    }

    /**
     * @test
     * @return boolean
     */
    function SomeOtherMethod()
    {
        $this->assertTrue(true);
    }

}
?>