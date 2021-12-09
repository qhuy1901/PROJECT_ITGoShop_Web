<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class Imports implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'ProductId' => $row[0],
            'ProductName' => $row[1],
            'Quantity' => $row[2],
            'Price' => $row[3],
            'Cost' => $row[4]
        ]);
    }
}
