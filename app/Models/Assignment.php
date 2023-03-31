<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cource;
use App\Models\Submission;

class Assignment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 'description', 'file_path', 'due_date' 
    ];
    
    // Relationships
    public function Cource()
    {
        return $this->belongsTo(Cource::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    } 

} 
