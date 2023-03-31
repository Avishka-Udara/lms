<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Assignment;

class Submission extends Model
{
    use HasFactory; 

    protected $fillable = [
        'description', 'file_path', 'due_date' 
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }
}
