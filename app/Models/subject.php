<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\student;
use App\Models\teacher;

class subject extends Model
{
    use HasFactory;

    protected $table='subjects';
    protected $fillable=['subject'];

    public function student(){
        return $this->hasMany(student::class,"subject_id","id");
    }

    public function teacher(){
        return $this->hasMany(teacher::class,"subject_id","id");
    }
}
