<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'ProductName' => $row[0],
            'SubBrandId'=>$row[1],
            'BrandId'=>$row[2],
            'CategoryId'=>$row[3],
            'Discount'=>$row[4],
            'Price' => $row[5],
            'Cost' => $row[6],
            'Quantity' => $row[7],
            'ProductImage' => $row[8],
        ]);
    }
}
