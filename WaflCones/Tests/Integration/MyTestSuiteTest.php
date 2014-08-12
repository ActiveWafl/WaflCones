<?php

namespace WaflCones\Tests\Integration;

class MyTestSuiteTest
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

//    public function testExample() {
//	$this->webDriver->get(\Wafl\Core::$WEB_ROOT);
//
//	// adding cookie
//	$this->webDriver->manage()->deleteAllCookies();
//	$this->webDriver->manage()->addCookie(array(
//	    'name' => 'cookie_name',
//	    'value' => 'cookie_value',
//	));
//
//    }
//
    public function testGetText()
    {
        $this->webDriver->get(\Wafl\Core::$WEB_ROOT);
        $element = $this->webDriver->findElement(\WebDriverBy::id('MainContentHeaderTitle'));
        $this->assertTrue($element);
    }

//
//    public function testGetById() {
//	$this->webDriver->get(\Wafl\Core::$WEB_ROOT);
//	$this->assertEquals(
//		'Test by ID', $this->webDriver->findElement(WebDriverBy::id('ContentSection'))->getText()
//	);
//    }
//
//    public function testGetByClassName() {
//	$this->webDriver->get(\Wafl\Core::$WEB_ROOT);
//	self::assertEquals(
//		'Test by Class', $this->webDriver->findElement(WebDriverBy::className('Title'))->getText()
//	);
//    }
//
//    public function testGetByCssSelector() {
//	$this->webDriver->get(\Wafl\Core::$WEB_ROOT);
//	self::assertEquals(
//		'Test by Class', $this->webDriver->findElement(WebDriverBy::cssSelector('.Inset'))->getText()
//	);
//    }
//
//    public function testGetByLinkText() {
//	$this->webDriver->get(\Wafl\Core::$WEB_ROOT);
//	self::assertEquals(
//		'ActiveWAFL Blog', $this->webDriver->findElement(WebDriverBy::linkText('ActiveWAFL Blog'))->getText()
//	);
//    }
//    public function testGetByName() {
//	$this->webDriver->get(\Wafl\Core::$WEB_ROOT);
//	self::assertEquals(
//		'Test Value', $this->webDriver->findElement(WebDriverBy::name('test_name'))->getAttribute('value')
//	);
//    }
//    public function testGetByXpath() {
//	$this->webDriver->get(\Wafl\Core::$WEB_ROOT);
//	self::assertEquals(
//		'Test Value', $this->webDriver->findElement(WebDriverBy::xpath('//input[@name="test_name"]'))->getAttribute('value')
//	);
//    }
//    public function testGetByPartialLinkText() {
//        \DblEj\Logging\Tracing::Trace("Calling testGetByPartialLinkText", E_INFO, new \DblEj\Logging\EchoConsoleTraceHandler());
//	$this->webDriver->get(\Wafl\Core::$WEB_ROOT);
//	self::assertEquals(
//		'ActiveWAFL Online Documentation', $this->webDriver->findElement(WebDriverBy::partialLinkText('ActiveWAFL'))->getText()
//	);
//        $this->webDriver->close();
//    }
//    public function testGetByTagName() {
//	$this->webDriver->get(\Wafl\Core::$WEB_ROOT);
//	self::assertEquals(
//		'Learn More', $this->webDriver->findElement(WebDriverBy::tagName('h5'))->getText()
//	);
//        $this->webDriver->close();
//    }
}