<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;

    protected $fillable=['t_name','age','gender','phone','subject_id'];

    public function student(){
        return $this->hasMany(student::class,"teacher_id","id");
    }

    public function subject(){
        return $this->hasMany(subject::class,"id","subject_id");
    }
}
