<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentTicket extends Model
{
    protected $guarded = false;

    public function Student()
    {
        return $this->belongsTo(Student::class);
    }
}
