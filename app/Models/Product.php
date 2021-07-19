<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','description','pricing','user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeProducto($query, $producto){

        if (trim($producto) !="") {
            $query->where('name','like',"%$producto%");

        }
    }
}
