<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product',
        'name', 
        'description', 
        'stock',
        'category',  // Adjusted column name to match the foreign key
        'price',  
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
