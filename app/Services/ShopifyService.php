<?php

namespace App\Services;

use App\Services\SalesChannel;
use GuzzleHttp\Client;

class ShopifyService implements SalesChannel
{
    public function __construct()
    {
        $this->client = new Client;
    }

    public function call()
    {
        $response = $this->client->get("https://" . config('services.shopify.app_key') . ":" . config('services.shopify.app_password') . "@" . \config('services.shopify.store') . "myshopify.com/admin/api/2019-04/product.json");

        return $response;


        // https://{username}:{password}@{shop}.myshopify.com/admin/api/{api-version}/{resource}.json
        //GET /admin/api/2019-04/variants/#{variant_id}.json

        // return json_encode([
        //     [
        //         'name'      => 'shirt',
        //         'sku'       => 'shi',
        //         'quantity'  => 10,
        //         'price'     => 20
        //     ],
        //     [
        //         'name'       => 'hat',
        //         'sku'       => 'hat',
        //         'quantity'  => 10,
        //         'price'     => 25
        //     ]
        // ], true);
    }

}
