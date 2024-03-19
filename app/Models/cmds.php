<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cmds extends Model
{
    
    use HasFactory;
    protected $fillable = ['command_code','name'];
    public function utilisateure()
    {
        return $this->belongsTo(Utilisateures::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
