<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{

    protected $table = 'orders';
    protected $primaryKey = 'orders_id';
    protected $allowedFields = ['order_number', 'user_id', 'order_date'];    

}
