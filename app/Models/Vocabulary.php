<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    use HasFactory;

    protected $fillable = [
        'english',
        'vietnamese',
        'image',
        'topic_id'
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }
}
