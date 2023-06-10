<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cource_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cource()
    {
        return $this->belongsTo(Cource::class);
    }

    public function submissions()
    {
        return $this->hasMany(AssignmentSubmission::class);
    }

}
