<?php

namespace WaflCones\Api;

use DblEj\Communication\Ajax\AjaxResult,
    DblEj\Data\ArrayModel;

class Example
{

    /**
     * Do something and return an ajax result
     * 
     * @param array $args The arguments passed to this api call
     * @param array $headers The http headers that came along with this api call or null if the call didn't come via http
     * @param array $files Any binary stream arguments passed to this api call (such as file uploads)
     * 
     * @return \DblEj\Communication\Ajax\AjaxResult
     */
    public static function FirstExample($args, $headers, $files)
    {
        //do something
        if (isset($args["Arg1"]) && $args["Arg1"] == "SomeValue") //hypthetical logic
        {
            
        }
        if (isset($headers["some-header"]) && $args["some-header"] == "some-value") //hypthetical logic
        {
            
        }
        if (count($files) == 0) //hypthetical logic
        {
            
        }

        //you can return an ajax result
        return new AjaxResult("Call completed!");
    }

    /**
     * Do something and return a data model
     * 
     * @param array $args The arguments passed to this api call
     * @param array $headers The http headers that came along with this api call or null if the call didn't come via http
     * @param array $files Any binary stream arguments passed to this api call (such as file uploads)
     * 
     * @return \DblEj\Communication\Ajax\AjaxResult
     */
    public static function SecondExample($args, $headers, $files)
    {
        //do something
        if (isset($args["Arg1"]) && $args["Arg1"] == "SomeValue") //hypthetical logic
        {
            
        }
        if (isset($headers["some-header"]) && $args["some-header"] == "some-value") //hypthetical logic
        {
            
        }
        if (count($files) == 0) //hypthetical logic
        {
            
        }

        //you can also return a model or an array of models
        return new ArrayModel(["SomeProperty"    => "SomeValue",
            "AnotherProperty" => "AnotherValue"]);
    }

}