<?php

namespace App\Models;
use App\Models\utilisateures;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addresse extends Model
{
    use HasFactory;
    protected $fillable = ['id','address','city','country'];
    public function utilisateure()
    {
        return $this->belongsTo(utilisateures::class);
        
    }
}
