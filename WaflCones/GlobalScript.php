<?php

use Wafl\Routers\Api,
    Wafl\Routers\ApplicationGlobal,
    Wafl\Routers\CaptchaImage,
    Wafl\Routers\Controller,
    Wafl\Routers\ControlResource,
    Wafl\Routers\Extensions,
    Wafl\Routers\Glyphs,
    Wafl\Routers\Icons,
    Wafl\Routers\Models,
    Wafl\Routers\PageIncludes,
    Wafl\Routers\SitewideControls,
    Wafl\Routers\WaflIncludes,
    Wafl\Util\HttpRouter;

HttpRouter::AddRouter(new CaptchaImage());
HttpRouter::AddRouter(new WaflIncludes());
HttpRouter::AddRouter(new SitewideControls());
HttpRouter::AddRouter(new ApplicationGlobal());
HttpRouter::AddRouter(new ControlResource());
HttpRouter::AddRouter(new Extensions());
HttpRouter::AddRouter(new Controller());
HttpRouter::AddRouter(new Glyphs());
HttpRouter::AddRouter(new Icons());
HttpRouter::AddRouter(new Api());
HttpRouter::AddRouter(new Models());
HttpRouter::AddRouter(new PageIncludes());
?>