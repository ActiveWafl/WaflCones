<?php

namespace WaflCones\Tests\Integration;

class OtherTestSuite
extends \Wafl\Extensions\Selenium\TestCase
implements \DblEj\UnitTesting\ITestCase
{

    public function Get_TestType()
    {
        return TestCase::INTEGRATION_TEST;
    }

    public function GetHumanReadableTestType()
    {
        return "Integration Test";
    }

    /**
     * @test
     * @return boolean
     */
    function SomeOtherMethod()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     * @return boolean
     */
    function AnotherSomeOtherMethod()
    {
        $this->assertTrue(true);
    }

//    function testGetText() {
//	$this->assertTrue(true);
//	$this->assertTrue($this->webDriver!=null);
//        $this->webDriver->get("http://d.myapp.tld");
//    }    
//    
//    public function testExample() {
//        $this->assertTrue(true);
//	// navigate to 'http://docs.seleniumhq.org/'
//	$this->webDriver->get(\Wafl\Core::$WEB_ROOT);
//
//	// adding cookie
//	$this->webDriver->manage()->deleteAllCookies();
//	$this->webDriver->manage()->addCookie(array(
//	    'name' => 'cookie_name',
//	    'value' => 'cookie_value',
//	));
//
//	// click the link 'About'
//	$link = $this->webDriver->findElement(
//		WebDriverBy::id('menu_about')
//	);
//	$link->click();
//
//	// Search 'php' in the search box
//	$input = $this->webDriver->findElement(
//		WebDriverBy::id('q')
//	);
//	$input->sendKeys('php')->submit();
//
//	// wait at most 10 seconds until at least one result is shown
//	$this->webDriver->wait(10)->until(
//		WebDriverExpectedCondition::presenceOfAllElementsLocatedBy(
//			WebDriverBy::className('gsc-result')
//		)
//	);
//    }
}
?>