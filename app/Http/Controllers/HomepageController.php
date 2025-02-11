<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    private $productRepo;

    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }
    public function index()
    {

        $products = $this->productRepo->orderProductsById();

        $hour = date('H');

        $currentTime = date("H:i:s");

        return view('welcome', compact('currentTime', 'hour', 'products'));
    }
}
