<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\types;
class marques extends Model
{
    use HasFactory;

    public function types()
{
    return $this->hasMany(types::class, 'Id_marque', 'Id_marque');
}
}
