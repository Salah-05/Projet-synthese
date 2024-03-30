<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\aides;
class administrateurs extends Model
{
    use HasFactory;
    public function aides()
{
    return $this->hasMany(aides::class, 'Id_Administrateur', 'Id_Administrateur');
}

}
