<?php namespace App\Models;

use CodeIgniter\Model;

class SalesModel extends Model{

    protected $table = 'sales_records';
    protected $primaryKey = 'Sales_id';
    protected $allowedFields = ['Sales_Discount','Sales_TotalPrice','Sales_Date'];
}

?>
