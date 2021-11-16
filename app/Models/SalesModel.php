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
                        ->where('Product_Quantity>', 0)
                        ->get()
                        ->getResultArray();
    }

    function select_one_product($product_id)
    {
        return $this->db->table('product')
                        ->select('Product_img')
                        ->where('Product_id ', $product_id)
                        ->get()
                        ->getRowArray();
    }

    function select_one_sale($sales_id)
    {
        return $this->db->table('sales_records')
                        ->select('*')
                        ->where('Sales_Id  ', $sales_id)
                        ->get()
                        ->getRowArray();
    }

    function select_sale_item($sales_id)
    {
        return $this->db->table('sales_product')
                        ->select('*')
                        ->where('sales_product.Sales_Id ', $sales_id)
                        ->join('product', 'product.Product_id  = sales_product.Product_id')
                        ->get()
                        ->getResultArray();
    }

    function monthly_sales_report($month, $year)
    {
        $start_date = $year . "-" . $month . "-01";
        $d = new \DateTime($start_date);
        $end_date = $d->format('Y-m-t');

        return $this->db->table('sales_product')
                        ->select('product.Product_id, product.Product_Name, product.Category, SUM(sales_product.SPro_Quantity) AS pro_total_quantity, SUM(sales_product.SPro_Price) AS pro_total_sale')
                        ->join('product', 'product.Product_id  = sales_product.Product_id')
                        ->join('sales_records', 'sales_records.Sales_Id  = sales_product.Sales_Id')
                        ->where('sales_records.Sales_Date >=', $start_date)
                        ->where('sales_records.Sales_Date <=', $end_date)
                        ->groupBy("sales_product.Product_id")
                        ->orderBy('pro_total_sale', 'DESC')
                        ->get()
                        ->getResultArray();
    }

}
