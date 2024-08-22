<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome', 
        'descricao', 
        'preco', 
        'data_de_validade', 
        'imagem', 
        'categoria_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'data_de_validade' => 'date', // Certifique-se de que a data seja armazenada como um objeto de data
        'preco' => 'float' // Ou 'double', dependendo do seu tipo de dados exato no banco de dados
    ];

    // Define o relacionamento com a categoria (se você tiver um modelo Category)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}