<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $fillable = ['room_number', 'description', 'available', 'status', 'room_type_id'];


    public function room_type()
    {
        return $this->belongsTo('App\Model\RoomType');
    }

    public function room_bookings()
    {
        return $this->hasMany('App\Model\RoomBooking');
    }

    public function reviews()
    {
        return $this->hasManyThrough('App\Model\Review', 'App\Model\RoomBooking');

    }
}
