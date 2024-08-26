<?php

namespace App\Controllers;

class HomeControllers
{
    public function index(): void
    {
        include_once APP_PATH.'/views/pages/home.php';
    }
}
