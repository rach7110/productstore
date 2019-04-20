<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Services\ShopifyService;
use App\Services\VendService;

class ProductsController extends Controller
{
    protected $vendSrv;
    protected $shopifySvc;


    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->vendSrv = new VendService;
        $this->shopifySvc = new ShopifyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return response()->json($products);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return response()->json($product);
    }

    /**
     * Sync our database with Sales Channels.
     *
     * @return \Illuminate\Http\Response
     */
    public function sync()
    {
        $vendProducts = collect(json_decode($this->vendSrv->call(), true));
        $shopifyProducts = collect(json_decode($this->shopifySvc->call(), true));

        $products = $vendProducts
            ->merge($shopifyProducts)
            ->groupBy('sku');

        foreach($products as $product) {
            // Compile quantities from multiple sales channels.
            if($product->count() > 1) {

            } else {
                $product = $product->first();
                $stitchProduct = Product::firstOrCreate(['sku' => $product['sku'] ]);
            }
        }

    }
}
