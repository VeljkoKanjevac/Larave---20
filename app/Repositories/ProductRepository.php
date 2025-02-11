<?php

namespace App\Repositories;

use App\Models\ProductsModel;
use Illuminate\Support\Facades\Request;

class ProductRepository
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductsModel();
    }

    public function createNew($request)
    {
        $this->productModel->create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'amount' => $request->get('amount'),
            'image' => $request->get('image')
        ]);
    }
        public function getProductById($id)
        {
            $product = ProductsModel::where(['id' => $id])->first();
            return $product;
        }

        public function edit($product, $request)
        {
            $product->update([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'price' => $request->get('price'),
                'amount' => $request->get('amount'),
                'image' => $request->get('image')
            ]);
        }

        public function orderProductsById()
        {
           return $this->productModel->orderBy('id', 'desc')->take(6)->get();
        }
}
