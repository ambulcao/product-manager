<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome', 
    ];

    // Defina o relacionamento com os produtos (se necessário)
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}