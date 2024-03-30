<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\produits;
use App\Models\marques;
class types extends Model
{
    use HasFactory;
    public function produits()
{
    return $this->hasMany(produits::class, 'Id_type', 'Id_type');
}
public function marque()
{
    return $this->belongsTo(marques::class, 'Id_marque', 'Id_marque');
}

}
