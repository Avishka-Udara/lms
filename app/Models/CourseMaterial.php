<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cource;

class CourseMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'file_path'
    ];

    public function Cource()
    {
        return $this->belongsTo(Cource::class);
    }
}
