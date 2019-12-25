<?php
    use System\Application;
    use System\Http\Request;

    require_once(__DIR__.'/vendor/autoload.php');

    $app = Application::getKernel();
    $app->boot();

    $request = new Request($_SERVER);
    
    $response = $app->handle($request);
    $response->send();
