<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\clients;

class avis_sur_le_produits extends Model
{
    use HasFactory;
    public function client()
{
    return $this->belongsTo(clients::class, 'id', 'id');
}

}
