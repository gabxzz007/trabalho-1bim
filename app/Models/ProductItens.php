<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductItens extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantidade',
        'cor',
        'valor'
    ];
    public function product()
{
    return $this->belongsTo(Product::class, 'product_id');
}
}