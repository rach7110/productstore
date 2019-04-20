<?php

namespace App\Services;

use App\Services\SalesChannel;

class ShopifyService implements SalesChannel
{
    public function call()
    {
        return json_encode([
            [
                'name'      => 'shirt',
                'sku'       => 'shi',
                'quantity'  => 10,
                'price'     => 20
            ],
            [
                'name'       => 'hat',
                'sku'       => 'hat',
                'quantity'  => 10,
                'price'     => 25
            ]
        ], true);
    }

}
