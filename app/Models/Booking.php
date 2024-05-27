<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Booking extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'room_id',
        'user_id',
        'name',
        'email',
        'phone',
        'start_date',
        'end_date'
    ];


    public function room()
    {
        return $this->hasOne('App\Models\Room','id','room_id');
    }
    public function user()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }
}
