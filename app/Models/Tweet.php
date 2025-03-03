<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// php artisan make:model Tweet

class Tweet extends Model
{
    use HasFactory;

    // fillable propiedad permite la asignación masiva
    protected $fillable = [
        'message',
        /* 'name' */
    ];


    // Definir lo inverso de la relación
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    // Relación: Uno a muchos
    public function replies()
    {
        return $this->hasMany(Reply::class, 'tweet_id', 'id');
    }

}
