<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function profile()
    {
        return $this->render('admin/profile');
    }

    public function dashboard()
    {
        return $this->render('admin/dashboard');
    }
}
