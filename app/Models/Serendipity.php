<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serendipity extends Model
{
    //

    use HasFactory;

    protected $fillable = [
        'user_id',
        'activity',
        'description',
        'imgurl',
        'duration',
        'rating',
        'visibility',
        'completed_at',
        'comment',
        'image_path',
    
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
