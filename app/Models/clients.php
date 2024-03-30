<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\addresses;
class clients extends Model
{
    use HasFactory;
    public function adresses()
{
    return $this->hasMany(addresses::class, 'id_client', 'id_client');
}

}
