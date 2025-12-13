<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model


{
    protected $guarded = false;
    use SoftDeletes;
    use HasFactory;

    //
    public function Students()
    {
        return $this->hasMany(Student::class);
    }

    public function StudentsAge()
    {
        return $this->Students()->where('age', '>', 32);
    }

    public function books()
    {
        return $this->hasManyThrough(Book::class, Student::class);
    }
}

