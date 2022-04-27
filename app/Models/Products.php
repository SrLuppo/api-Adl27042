<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    /**
     * Table name
     * Primary Key
     * Model fields
     * @table string
     * @primaryKey string
     * @fillable array
     */
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'sku', 'qtd', 'created_at', 'updated_at'];

}
