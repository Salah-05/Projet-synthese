<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\clients;
use App\Models\produits;
class commandes extends Model
{
    use HasFactory;

    public function client()
{
    return $this->belongsTo(clients::class, 'id_client', 'id_client');
}
public function produits()
{
    return $this->belongsToMany(produits::class, 'contenir', 'Id_commande', 'Id_produit')
                ->withPivot('qte')
                ->withTimestamps();
}


}
