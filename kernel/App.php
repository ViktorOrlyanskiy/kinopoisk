<?php

namespace App\Kernel;

use App\Kernel\Container\Container;

class App
{
    private Container $container;

    public function __construct()
    {
        $this->container = new Container;
    }

    public function run(): void
    {

        $router = $this->container->router;
        $request = $this->container->request;

        $uri = $request->getUri();
        $method = $request->getMethod();

        $router->dispatch($uri, $method);
    }
}
