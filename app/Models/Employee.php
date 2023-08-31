<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    protected $fillable =[
        'name',
        'email',
        'department',
        'password',
        'roll'
       ];
     function leave():HasMany
       {
         return $this->hasMany(Leave::class);
       }
}
