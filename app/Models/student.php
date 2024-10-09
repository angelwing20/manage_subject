<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $fillable=['s_name','age','gender','phone','subject_id','teacher_id'];

    public function subject(){
        return $this->belongsTo(subject::class,"subject_id","id");
    }

    public function teacher(){
        return $this->belongsTo(teacher::class,"id","teacher_id");
    }
}
