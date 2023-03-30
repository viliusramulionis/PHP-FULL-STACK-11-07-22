<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public function categories() {
        return $this->belongsToMany(Categories::class, 'product_categories', 'product_id', 'category_id');
    }
}
