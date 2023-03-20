<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    // Metodo pavadinimas yra pasirinktinas
    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
