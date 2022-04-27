<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    /**
     * Table name
     * Primary Key
     * Model fields
     * @table string
     * @primaryKey string
     * @fillable array
     */
    protected $table = 'histories';
    protected $primaryKey = 'id';
    protected $fillable = ['sku', 'qtd', 'created_at', 'updated_at', 'productID'];
}
