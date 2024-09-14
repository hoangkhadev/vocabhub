<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'max_score',
        'count',
        'user_id'
    ];

    public function vocabulary()
    {
        return $this->hasMany(Vocabulary::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
