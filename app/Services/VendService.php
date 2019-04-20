<?php

namespace App\Services;

use App\Services\SalesChannel;

class VendService implements SalesChannel
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
                'name'       => 'boat',
                'sku'       => 'boa',
                'quantity'  => 10,
                'price'     => 25
            ]
        ], true);
    }

}
