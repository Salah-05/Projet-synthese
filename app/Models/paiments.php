<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\commandes;
use App\Models\cartes;
class paiments extends Model
{
    use HasFactory;
    public function commande()
{
    return $this->belongsTo(commandes::class, 'Id_commande', 'Id_commande');
}
public function carte()
{
    return $this->belongsTo(cartes::class, 'Id_carte', 'Id_carte');
}


}
