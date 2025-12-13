<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = false;
    //
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
