<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    private $productRepo;

    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }
    public function saveProduct(SaveProductRequest $request)
    {
        $this->productRepo->createNew($request);

        return redirect()->route('allProducts');
    }

    public function getAllProducts()
    {
        $allProducts = ProductsModel::all();

        return view('allProducts', compact('allProducts'));
    }

    public function deleteProduct($product)
    {
        $singleProduct = $this->productRepo->getProductById($product);

        if($singleProduct === null)
        {
            die("Ovaj proizvod ne postoji");
        }

        $singleProduct->delete();

        return redirect()->back();
    }

    public function getProductById(ProductsModel $product)
    {
        return view('updateProduct', compact('product'));
    }

    public function updateProduct(SaveProductRequest $request,ProductsModel $product)
    {
        $this->productRepo->edit($product, $request);

        return redirect()->route('allProducts');
    }
}
