<?php

namespace App\Models;
use App\Models\addresse;
use App\Models\payments;
use App\Models\cmds;

use Faker\Provider\ar_EG\Address;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class utilisateures extends Authenticatable
{
    use Notifiable;
   
    use HasFactory;
    protected $fillable = ['id','name','email','phone_number','password'];

    public function commands()
    {
        return $this->hasMany(cmds::class,'utilisateure_id');
    }

    public function addresses()
    {
        return $this->hasMany(addresse::class,'utilisateure_id');
    }
    

    public function payments()
    {
        return $this->hasMany(payments::class);
    }
}
