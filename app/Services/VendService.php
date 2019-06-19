<?php

namespace App\Services;

use App\Services\SalesChannel;
use GuzzleHttp\Client;


class VendService implements SalesChannel
{

    public function __construct()
    {
        $this->client = new Client;
    }

    public function call()
    {
        $client_id = config('services.vend.client_id');

        $response = $this->client->get('https://secure.vendhq.com/connect?response_type=code&client_id=' . $client_id . '&redirect_uri={redirect_uri}&state={state}');

        // return json_encode([
        //     [
        //         'name'      => 'shirt',
        //         'sku'       => 'shi',
        //         'quantity'  => 10,
        //         'price'     => 20
        //     ],
        //     [
        //         'name'       => 'boat',
        //         'sku'       => 'boa',
        //         'quantity'  => 10,
        //         'price'     => 25
        //     ]
        // ], true);
    }

}
