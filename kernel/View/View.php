<?php

namespace App\Kernel\View;

use App\Kernel\Exeptions\ViewNotFoundExeption;
use App\Kernel\Session\SessionInterface;

class View implements ViewInterface
{
    public function __construct(private SessionInterface $session)
    {
        $this->session = $session;
    }

    public function page(string $name): void
    {

        $path = APP_PATH."/views/pages/$name.php";

        if (! file_exists($path)) {
            throw new ViewNotFoundExeption("View $name not found");
        }

        extract([
            'view' => $this,
            'session' => $this->session,
        ]);

        include_once $path;
    }

    public function component(string $name): void
    {

        $path = APP_PATH."/views/components/$name.php";

        if (! file_exists($path)) {
            echo "Component $name not found";

            return;
        }

        include_once $path;
    }
}
