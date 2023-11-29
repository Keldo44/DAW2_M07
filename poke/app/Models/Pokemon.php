<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    
    use HasFactory;

   

    // Exclude _token from mass assignment
    protected $guarded = ['_token'];

}
