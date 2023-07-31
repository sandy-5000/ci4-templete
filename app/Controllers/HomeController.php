<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        return $this->render('home');
    }

    public function framework()
    {
        $this->layout = null;
        return $this->render('framework');
    }
}
