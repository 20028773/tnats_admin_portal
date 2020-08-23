<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Observation extends Model
{
    use Notifiable;
    protected $fillable = [
        'photo',
    ];

    public function getImageAttribute()
    {
        return $this->photo;
    }
}
