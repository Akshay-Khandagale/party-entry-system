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

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function gate()
    {
        return $this->belongsTo(Gate::class);
    }
}
