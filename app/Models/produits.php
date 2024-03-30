<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\commentaires;
use App\Models\promotions;
use App\Models\avis_sur_le_produits;
use App\Models\types;
class produits extends Model
{
    use HasFactory;
    public function commentaires()
    {
        return $this->hasMany(commentaires::class, 'Id_produit', 'Id_produit');
    }
    public function promotions()
{
    return $this->hasMany(promotions::class, 'Id_produit', 'Id_produit');
}
public function avis()
{
    return $this->hasMany(avis_sur_le_produits::class, 'Id_produit', 'Id_produit');
}
public function type()
{
    return $this->belongsTo(types::class, 'Id_type', 'Id_type');
}

}
