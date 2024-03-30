<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\clients;
use App\Models\administrateurs;
class aides extends Model
{
    use HasFactory;
    public function client()
{
    return $this->belongsTo(clients::class, 'id', 'id');
}
public function administrateur()
{
    return $this->belongsTo(administrateurs::class, 'Id_Administrateur', 'Id_Administrateur');
}



}
