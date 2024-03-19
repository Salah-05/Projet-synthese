<?php

namespace App\Models;
use App\Models\utilisateures;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    use HasFactory;
    public function utilisateure()
    {
        return $this->belongsTo(utilisateures::class);
    }
}
