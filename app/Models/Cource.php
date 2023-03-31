<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cource extends Model
{
    use HasFactory;

    protected $fillable = [
        'cource_name','cource_detail','creator_id','enrollment_key','image','year','semester'
    ];

    public function materials()
    {
        return $this->hasMany(CourseMaterial::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
    
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    } 
    
}
