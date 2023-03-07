<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cource extends Model
{
    use HasFactory;
    protected $fillable = [
        'cource_name','cource_detail','creator_id','enrollment_key',
    ];
}
