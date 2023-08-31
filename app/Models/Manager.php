<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
   protected $fillable =[
    'name',
    'email',
    'password',
    'roll'
   ];
}
