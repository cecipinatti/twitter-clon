<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// php artisan make:model Reply

class Reply extends Model
{
    use HasFactory;

    //
    protected $fillable = [
        'message',
    ];


    // Definir lo inverso de la relación
    public function tweet()
    {
        return $this->belongsTo(Tweet::class, 'tweet_id', 'id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
