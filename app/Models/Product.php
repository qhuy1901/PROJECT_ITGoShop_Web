<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false; // ko có dòng này sẽ lỗi
    protected $fillable = [
        'ProductName', 'Discount', 'Quantity', 'Price', 'Cost', 'Sold' , 'SubBrandId', 'BrandId', 'CategoryId', 'CreatedAt', 'StartsAt','ProductImage'
    ];
    protected $primaryKey = 'ProductId';
    protected $table = 'Product';
}
