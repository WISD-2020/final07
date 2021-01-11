<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $fillable =
        [
        'type',
        'pics',
        'people',
        'price',
        'remark'
    ];


    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function details(){
        return $this->hasMany(Detail::class);
    }


}
