<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\produits;
class promotions extends Model
{
    use HasFactory;
    public function produit()
{
    return $this->belongsTo(produits::class, 'Id_produit', 'Id_produit');
}

}
