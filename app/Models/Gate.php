<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gate extends Model
{
    //
    protected $fillable = [
        'gate_name',
        'gate_code',
        'expires_at'
    ];
}
