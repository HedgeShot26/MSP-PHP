<?php namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model{

    protected $table = 'product';
    protected $primaryKey = 'Product_id';
    protected $allowedFields = ['Product_Name','Product_Price','Product_Quantity'];
}

?>
