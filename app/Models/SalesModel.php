<?php namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class SalesModel extends Model{

    protected $table = 'sales_records';
    protected $primaryKey = 'Sales_id';
    protected $allowedFields = ['Sales_Discount','Sales_TotalPrice','Sales_Date'];
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = $db;
    }

    function select_all()
    {
        return $this->db->table('sales_records')->get()->getResultArray();
    }

    function select_product_category()
    {
        return $this->db->table('product')
                        ->select('Category')
                        ->groupBy('Category')
                        ->get()
                        ->getResultArray();
    }

    function fetch_product($category)
    {
        return $this->db->table('product')
                        ->where('Category', $category)
                        ->get()
                        ->getResultArray();
    }


}

?>
