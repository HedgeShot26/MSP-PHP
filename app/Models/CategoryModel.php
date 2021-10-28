<?php namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model{

    protected $table = 'category';
    protected $primaryKey = 'Cat_id';
    protected $allowedFields = ['Cat_name'];
}

?>
