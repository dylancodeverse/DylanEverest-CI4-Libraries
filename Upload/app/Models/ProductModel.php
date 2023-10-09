<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'products_id';
    protected $allowedFields = ['product_name', 'price','user_id'];
}
