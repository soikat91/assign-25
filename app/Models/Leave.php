<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Leave extends Model
{
    protected $fillable =[
        'subject',
        'message',
        'reason',
        'start_date',
        'end_date',
        'status',
        'employee_id'
       ];

    function employee():BelongsTo
       {
         return $this->belongsTo(Employee::class);
       }
    
}
