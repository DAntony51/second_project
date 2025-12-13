<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    protected $guarded = false;
    use SoftDeletes;
    use HasFactory;

    public function studentticket()
    {
        return $this->hasOne(StudentTicket::class);
    }
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
