<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntryLog extends Model
{
    //
    protected $fillable = [
        'employee_id',
        'gate_id',
        'face_image'
    ];
}
