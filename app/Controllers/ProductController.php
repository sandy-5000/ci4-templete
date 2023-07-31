<?php

namespace App\Controllers;

class ProductController extends BaseController
{
    public function index()
    {
        return $this->render('products');
    }

    public function find($product_id)
    {
        $this->layout = 'darkView';
        return $this->render('products', ['product_id' => $product_id]);
    }
}
