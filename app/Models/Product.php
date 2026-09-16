<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'preco',
        'unidade_medida'
        
    ];
    public function itens()
{
    return $this->hasMany(ProductItens::class, 'product_id');
}
}