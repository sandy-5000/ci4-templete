<?php

namespace App\Controllers;

class BlogController extends BaseController
{
    public function index()
    {
        return $this->render('blogindex');
    }

    public function find($page)
    {
        // page: node-js-and-express
        // $this->layout = 'darkView';
        return $this->render("blogs/$page");
    }
}
