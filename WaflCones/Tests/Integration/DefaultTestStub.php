<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
/**
 * Description of DefaultTestStub
 *
 * @author Evan
 */
class DefaultTestStub
extends PHPUnit_Extensions_SeleniumTestCase
{

    function setUp()
    {
        $this->setBrowser("*firefox");
        $this->setBrowserUrl("http://localhost/");
    }

    function testMyTestCase()
    {
        $this->open("/");
    }

}
?>