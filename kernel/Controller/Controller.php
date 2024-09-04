<?php

namespace App\Kernel\Controller;

use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Http\RedirectInterface;
use App\Kernel\Http\RequestInterface;
use App\Kernel\Session\SessionInterface;
use App\Kernel\View\ViewInterface;

abstract class Controller
{
    private ViewInterface $view;

    private RequestInterface $request;

    private RedirectInterface $redirect;

    private SessionInterface $session;

    private DatabaseInterface $database;

    public function setView(ViewInterface $view): void
    {
        $this->view = $view;
    }

    public function setRequest(RequestInterface $request): void
    {
        $this->request = $request;
    }

    public function setRedirect(RedirectInterface $redirect): void
    {
        $this->redirect = $redirect;
    }

    public function setSession(SessionInterface $session): void
    {
        $this->session = $session;
    }

    public function setDatabase(DatabaseInterface $database): void
    {
        $this->database = $database;
    }

    public function view(string $name): void
    {
        $this->view->page($name);
    }

    /**
     * @return RequestInterface
     */
    public function request()
    {
        return $this->request;
    }

    public function redirect(string $url): void
    {
        $this->redirect->to($url);
    }

    /**
     * @return SessionInterface
     */
    public function session()
    {
        return $this->session;
    }

    /**
     * @return DatabaseInterface
     */
    public function db()
    {
        return $this->database;
    }
}
