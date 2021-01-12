<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $table = 'details';

    protected $fillable = [
        'id',
        'reservation_id',
        'room_id',
        'total',
        'name',
        'quantity',
        'status',
        'price'
    ];

    public function reservation(){
        return $this->belongsTo(Reservation::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }

}
