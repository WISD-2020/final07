<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $fillable = [
        'id',
        'user_id',
        'checkin',
        'checkout',
        'cost',
        'states',

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function Details(){
        return $this->hasMany(Detail::class);
    }


}
